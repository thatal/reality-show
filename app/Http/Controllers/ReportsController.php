<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VoterTransaction;
use App\Models\ShowRound;
use App\Models\ArtistInRound;
use App\Models\VoterMaster;
use Crypt;

class ReportsController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
    public function overallVoting()
    {
        $overall_voting_details = VoterTransaction::with('round','round.artist')->get();
        $artistArrayList = [];
        $artistImage     = [];
       
        $allRounds = ShowRound::all();
        foreach($allRounds as $key => $value){
            if(sizeof($value)){
                foreach($value->artist_on_round as $k => $v){
                    $sum_vote = 0;
                    foreach($v->votes as $index => $val){
                        $sum_vote += $val->total_vote;
                    }
                    if(isset($artistArrayList[$v->artist->name])){
                        $artistArrayList[$v->artist->name] += $sum_vote;
                    }else{
                        $artistArrayList[$v->artist->name] = $sum_vote;
                        $artistImage[$v->artist->name] = [
                            'code'  => $v->artist->code,
                            'image' => $v->artist_image,
                            'id'    => $v->artist->id,
                        ];
                    }
                }
            }
        }
        ksort($artistArrayList);
        arsort($artistArrayList);
        $artist_image_dir = asset('web-assets/artist/');
        return view('admin.reports.overall_voting',compact('artistArrayList','artistImage','artist_image_dir'));
    }
    public function ajaxArtistVote($artist_id){
        $artist_id = Crypt::decrypt($artist_id);
        $round_wise_data = ArtistInRound::with('round','votes')->where('artist_master_id', '=', $artist_id)->orderBy('show_round_id', 'ASC')->get();
        $returnData = [];
        foreach($round_wise_data as $key => $data){
            $sum_vote = 0;
            foreach($data->votes as $key => $val){
                $sum_vote += $val->total_vote;
            }
            if(isset($returnData[$data->round->name])){
                $returnData[$data->round->name] += $sum_vote;
            }else{
                $returnData[$data->round->name] = $sum_vote;
            }
        }
        return response()->json($returnData);
    }

    public function votersReport(){
        $all_voters = VoterMaster::paginate(100);
        // dd($all_voters);
        return view('admin.reports.voterlist', compact('all_voters'));
    }
}
