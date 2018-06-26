<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShowRound;
use \App\Models\ArtistMaster;
use \App\Models\ArtistInRound;
use Validator, Crypt;

class MasterController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    // Round CRUD Methods
    function roundsCreate(Request $request){
        $all_rounds = ShowRound::orderBy('vote_open', 'ASC')->get();
        return view('admin.Masters.rounds_index', compact('all_rounds'));
    }
    function roundsSave(Request $request){
        
        $validate = Validator::make($request->all(), ShowRound::$rule);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput()->with('error', "Validation Fails.");
        }
        $insert_data = [
            'name'      => $request->name,
            'status'    => $request->status,
            'vote_open' => date('Y-m-d H:i:s', strtotime($request->vote_open)),
            'vote_close' => date('Y-m-d H:i:s', strtotime($request->vote_close)),
        ];
        // if($insert_data['status'] == 'active'){
        //     ShowRound::where('status','=', 'active')->update(['status' => 'not_active']);
        // }
        if(ShowRound::create($insert_data)){
            return redirect()->back()->with('success', "Round Successfully Created.");
        }else{
            return redirect()->back()->with('error', "Oops!! Something went wrong. Please Try again later.");
        }
    }
    public function roundsActivate($round_id){
        $round_id = Crypt::decrypt($round_id);
        // dump($round_id);
        $roundDetails = ShowRound::findOrFail($round_id);
        // dump($roundDetails);
        ShowRound::where('status', '=', ShowRound::$active)->update(['status'=>ShowRound::$not_active]);
        $roundDetails->status = ShowRound::$active;
        $roundDetails->save();
        return redirect()->back()->with('success', "Status Successfully Changed.");
    }
    // End of Round CRUD Methods

    // Contestant CRUD Methods
    public function contestantCreate() {
        $all_contestant = ArtistMaster::all();
        return view('admin.Masters.contestant_index',compact('all_contestant'));
    }
    public function contestantSave(Request $req) {
        $validate = Validator::make($req->all(), ArtistMaster::$rules);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput()->with('error', "Validation Fails.");
        }
        if(ArtistMaster::create($req->all())){
            return redirect()->back()->with('success', "Contestant Successfully Created.");
        }
    }
    public function contestantEdit($contestant_id) {
        $contestant_id = Crypt::decrypt($contestant_id);
        $singleContestant = ArtistMaster::findOrFail($contestant_id);
        return view('admin.Masters.edit_contestant',compact('singleContestant'));
    }
    public function contestantUpdate(Request $req, $contestant_id) {
        $contestant_id    = Crypt::decrypt($contestant_id);
        $singleContestant = ArtistMaster::findOrFail($contestant_id);
        $validate = Validator::make($req->all(), ArtistMaster::$rules);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput()->with('error', "Validation Fails.");
        }

        // if($singleContestant->update(array_except($req->all(), ['code']))){
        if($singleContestant->update($req->all(), ['code'])){
            return redirect()->back()->with('success', "Contestant Successfully Updated.");
        }
    }
    // End of Contestant CRUD Methods

    // Contestant in Round CRUD Methods
    public function contestant_roundsCreate(){
        $round_list = ShowRound::pluck('name', 'id')->toArray();
        $list[''] = '--SELECT--';
        $contestant_list = ArtistMaster::select('name','id')->where('status', '=','active')->orderBy('name', 'ASC')->get()->toArray();
        foreach($contestant_list as $index => $single){
            $list[$single['id']] = $single['name'];
        }
        $all_contestant_in_rounds = ArtistInRound::with(['artist' => function($q){
            $q->orderBy('name', 'ASC');
        }])->orderBy('show_round_id', 'ASC')->get();
        // dd($all_contestant_in_rounds);
        $artist_image_dir = url('web-assets/artist')."/";
        return view('admin.Masters.contestant_in_rounds', compact('round_list','list','all_contestant_in_rounds','artist_image_dir'));
    }
    public function contestant_roundsSave(Request $request) {
        $validate = Validator::make($request->all(), ArtistInRound::$rule, ArtistInRound::$message);
        if ($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput()->with('error', "Validation Fails.");
        }
        // Allowd only first time to create
        $cond_where = [[
                'show_round_id', '=', $request->get('show_round_id')
            ],
            [
                'artist_master_id', '=', $request->get('artist_master_id')
            ]
        ];
        
        $exists = ArtistInRound::where($cond_where)->count();
        if($exists){
            return redirect()->back()->with('error', 'Contestant Already in selected Round.');
        }
        $imageName = "";
        if ($request->hasFile('artist_image')){
            $destinationPath    = 'web-assets/artist';
            $imageName          = time().'_'.uniqid().'_'.$request->file('artist_image')->getClientOriginalName();
            $path = public_path() . '/' . $destinationPath . '/' . $imageName;
            $request->file('artist_image')->move($destinationPath, $imageName);
        }
        $data                   =[
            'artist_image'      => $imageName,
            'show_round_id'     => $request->get('show_round_id'),
            'artist_master_id'  => $request->get('artist_master_id'),
            'youtube_id'        => $request->get('youtube_id'),
            'status'            => $request->get('status')
        ];
        if(!ArtistInRound::create($data)){
            if(isset($path)){
                unlink($path);
            }
            return redirect()->back()->with('error', 'Oops! Something went wrong. Please try again later.');
        }
        return redirect()->back()->with('success', 'Aritst Details Successfully Added to Round.');
    }
    public function sendContestant(Request $request) {
        $rule = [
            'round' => 'required|exists:show_rounds,id',
            'ids'   => 'required'
        ];
        $validate = Validator::make($request->all(), $rule);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput()->with('error', "Validation Fails. Please check form and try again later.")->with('active','show show view');
        }
        
        $all_ids  = $request->get('ids');
        $round_id = $request->get('round');
        $roundDetails = ShowRound::find($round_id);
        $all_ids = array_map(function($a){
            return Crypt::decrypt($a);
        }, $all_ids);
        // dd($all_ids);
        $already_inserted = ArtistInRound::where('show_round_id','=', $round_id)->whereIn('artist_master_id', $all_ids)->with('artist')->get();
        
        $contestant_names = [];
        if (sizeof($already_inserted)){
            foreach($already_inserted as $val){
                $contestant_names[] = $val->artist->name;
            }
            return redirect()->back()->withErrors($validate)->withInput()->with('error', implode(', ', $contestant_names)." contestant already in selected Rounds. please try again.")->with('active','show show view');
        }
        // DB::beginTransaction();
        foreach($all_ids as $artist_id){
            $artist_img_tube = ArtistInRound::select('artist_image','youtube_id')->where('artist_master_id', $artist_id)->orderBy('id', 'DESC')->first();
            $insert_data = [
                'show_round_id'     => $round_id,
                'artist_master_id'  => $artist_id,
                'artist_image'      => $artist_img_tube->artist_image,
                'youtube_id'        => $artist_img_tube->youtube_id,
                'status'            => ArtistInRound::$active,
            ];
            ArtistInRound::create($insert_data);
        }
        return redirect()->route('admin.contestant_rounds.create')->withErrors($validate)->withInput()->with('success', " Contestants are Successfully transfered to ".$roundDetails->name." round.")->with('active','show show view');
        // DB::commit();
    }
    public function changeImageTube(Request $req, $id) {
        $id = Crypt::decrypt($id);
        $details = ArtistInRound::findOrFail($id);
        return view('admin.Masters.change_image_tube', compact('details'));
    }
    public function changeImageTubePost(Request $request, $id) {
        $id = Crypt::decrypt($id);
        $round_details = ArtistInRound::findOrFail($id);
        $customRule = [
            'artist_image'      => 'mimes:jpeg,gif,png,jpg|dimensions:min_width=250,max_width:250,min_height=270, max_height=270|nullable|max:5000',
        ];

        $customMessage = [
            'artist_image.dimensions'   => "Image size must be 250 x 270"
        ];
        $validate = Validator::make($request->all(), $customRule, $customMessage);
        if($validate->fails()){
            dd($validate->errors());
            return redirect()->back()->withErrors($validate)->withInput()->with('error', "Validation Fails. Please check form and try again later.");
        }
        $imageName = "";
        if ($request->hasFile('artist_image')){
            $destinationPath    = 'web-assets/artist';
            $imageName          = time().'_'.uniqid().'_'.$request->file('artist_image')->getClientOriginalName();
            $path = public_path() . '/' . $destinationPath . '/' . $imageName;
            $request->file('artist_image')->move($destinationPath, $imageName);
            $round_details->artist_image = $imageName;
        }
        if ($request->get('youtube_id') != ""){
            $round_details->youtube_id = $request->get('youtube_id');
        }
        if($round_details->save()){
            return redirect()->back()->withErrors($validate)->withInput()->with('success', "Successfully Updated.");
        }else{
            return redirect()->back()->withErrors($validate)->withInput()->with('error', "Oops! Something Went wrong. Please try again later.");
        }
        

    }
    public function chnageStatus($round_id) {
        $round_id = Crypt::decrypt($round_id);
        $round_details = ArtistInRound::findOrFail($round_id);
        $status = ArtistInRound::$active;
        if ($round_details->status == $status){
            $round_details->status = ArtistInRound::$not_active;
        }else{
            $round_details->status = $status;
        }
        if($round_details->save()){
            return redirect()->back()->with('success', 'Status Successfully Changed.')->with('active','status changed');
        }else{
            return redirect()->back()->with('error', 'Oops! Something Went wrong.')->with('active','status changing failed.');
        }
    }
    // End of Contestant in Round
}
