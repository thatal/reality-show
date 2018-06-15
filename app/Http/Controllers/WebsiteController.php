<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, Log, Validator;
use App\Models\ShowRound, App\Models\ArtistInRound, App\Models\ArtistMaster, App\Models\VoterMaster, App\Models\VoterTransaction;
use App\Http\Helpers\SmsHelper;

class WebsiteController extends Controller
{
    function __construct(){
        $this->middleware('web',['exept' => 'votePost']);
    }
    public function index() {
        $artist_image_dir = 'web-assets/artist/';
        $artistDetails    = ShowRound::with('artist_on_round','artist_on_round.artist')->where('status', '=', ShowRound::$active)->first();
        // dump($artistDetails);
        return view('website.index', compact('artistDetails', 'artist_image_dir'));
    }
    public function votePost(Request $req)
    {
        $smsHelper = new SmsHelper;
        $returnData = [
            'type'      => 'error',
            'message'   => 'Something Went Wrong.'
        ];
        //types time-expire, otp, success, error,
        // 0. Voting Time Validation
        // 1. validate mobile number, 
        // 2. Validate VoterID
        // 3. Validate OTP
        // 1. Voting time Validation
        $mobile_validation_rule = [
            'mobile' => 'required|digits:10',
            'id'     => 'required'
        ];
        $validate_mobile = Validator::make($req->all(), $mobile_validation_rule);
        if ($validate_mobile->fails()) {
            $returnData['type']     = 'validation';
            $returnData['message']  = 'Mobile Number Valdation Error';
        }else{
            // if Mobile number is validated
            $where = [];
            $current_time    = date('Y-m-d H:i:s');
            $where['status'] = ShowRound::$active;
            $where[]         = ['vote_open', '<=', $current_time];
            $where[]         = ['vote_close', '>=', $current_time];
            // $isAvailable     = ShowRound::with('artist_on_round','artist_on_round.')->where($where)->first();
            $getArtist = ArtistMaster::where('code', '=', $req->get('id'))->first();
            if (!sizeof($getArtist)) {
                $returnData['type']     = 'error';
                $returnData['message']  = 'Artist Not found.';
                return response()->json($returnData);
            }
            // if Artist is validate
            $AvailableShowRound   = ShowRound::where($where)->first();
            if (!sizeof($AvailableShowRound)) {
                $returnData['type']     = 'time-expire';
                $returnData['message']  = 'Voting Time Expired.';
                return response()->json($returnData);
            }
            // is Artist Available in the particualr Round
            $artistAvailable     = $AvailableShowRound->artist_on_round()->where('artist_in_rounds.artist_master_id', '=', $getArtist->id)->first();
            if(!sizeof($artistAvailable)){
                $returnData['type']     = 'error';
                $returnData['message']  = 'Artist Not in round';
                return response()->json($returnData);
            }

            // Is Mobile number is register with us
            $voter = VoterMaster::where('mobile', $req->get('mobile'))->first();
            if (!sizeof($voter)) {
                // If user is not register with us.
                $otp = rand(1523, 9864);
                $voterData = [
                    'mobile'                    => $req->get('mobile'),
                    'otp'                       => $otp,
                    'date_of_registration'      => $current_time,
                    // 'date_of_activation'        => '0000-00-00 00:00:00',
                    'otp_sent_date'             => $current_time,
                    'ip'                        => \Request::ip(),
                    'agent'                     => \Request::header('user-agent')
                ];
                $vote = VoterMaster::create($voterData);
                if ($vote) {
                    Log::info("OTP is generated ".$otp." for ".$req->get('mobile'));
                    $sms = "Your OTP is ".$otp." . Thank for Voting";
                    if(!$smsHelper->Send($req->get('mobile'), $sms)){
                        $returnData['type']     = 'error';
                        $returnData['message']  = 'OTP Sending Error.';
                    }else{
                        $returnData['type']     = 'otp';
                        $returnData['message']  = 'OTP Sent to your mobile';
                    }
                    return response()->json($returnData);
                }

            }else{
                // if Voter master is register with us
                // 1.1 if Vote master is active
                if ($voter->status == 'active') {

                    return response()->json($this->VoteArtist($artistAvailable->id, $voter->id));
                }else{
                    // If Voter master is not Active
                    // 1.1 find if OTP is Sent 
                    if ($req->get('otp')) {
                        // if otp is found check it with Voter master otp 
                        if ($voter->otp == $req->get('otp')) {

                            $voter->date_of_activation = $current_time;
                            $voter->status             = VoterMaster::$active;
                            $voter->save();
                            return response()->json($this->VoteArtist($artistAvailable->id, $voter->id));
                        }else{
                            $returnData['type']     = 'otp-error';
                            $returnData['message']  = 'OTP not match.';
                            return response()->json($returnData);
                        }
                    }else{
                        // if user is register and sent without OTP
                        // Then send again new otp
                        $otp = rand(1523, 9864);
                        $sms = "Your OTP is ".$otp." . Thank for Voting";
                        $voter->otp_sent_date = $current_time;
                        $voter->otp           = $otp;
                        $voter->save();
                        if(!$smsHelper->Send($req->get('mobile'), $sms)){
                            $returnData['type']     = 'error';
                            $returnData['message']  = 'OTP Sending Error.';
                        }else{
                            $returnData['type']     = 'otp';
                            $returnData['message']  = 'OTP Sent to your mobile';
                        }
                        Log::info("OTP is generated ".$otp." for ".$req->get('mobile'));
                        // $returnData['type']     = 'otp';
                        // $returnData['message']  = 'OTP Sent to your mobile';
                        return response()->json($returnData);

                    }
                }
            }

        }
        
        return response()->json($returnData);
    }

    private function VoteArtist($artist_in_round_id, $voter_id){
        $current_time = date('Y-m-d H:i:s');
        $voteWhereCond = [
            [
                'voter_master_id', '=', $voter_id
            ],
            [
                'artist_in_round_id', '=', $artist_in_round_id
            ]
        ];
        $voterTrasaction = VoterTransaction::where($voteWhereCond)->first();
        // if Trasaction is found increment it and check if greater then limit
        if (sizeof($voterTrasaction)) {
            // Check limit
            if($voterTrasaction->total_vote < VoterTransaction::$voting_limit){
                $voterTrasaction->total_vote         += 1 ;
                $voterTrasaction->date_of_transaction = $current_time;
                if($voterTrasaction->save()){
                    // Voting is Success
                    $returnData['type']     = 'success';
                    $returnData['message']  = 'Voting Success.';
                    return $returnData;
                }
            }else{
                    $returnData['type']     = 'voting-expire';
                    $returnData['message']  = 'You have crossed the limit of '.VoterTransaction::$voting_limit.'.';
                    return $returnData;
            }
        }else{
            // if it is the first time to vote Create new Transaction
            $transaction_data = [
                'artist_in_round_id'            => $artist_in_round_id,
                'voter_master_id'               => $voter_id,
                'total_vote'                    => 1,
                'date_of_transaction'           => $current_time
            ];
            if(VoterTransaction::create($transaction_data)){
                // Voting Success
                $returnData['type']     = 'success';
                $returnData['message']  = 'Voting Success.';
                return $returnData;
            }
        }
    }
}
