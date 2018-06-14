<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    function __construct(){
        $this->middleware('web');
    }
    public function index() {
        return view('website.index');
    }
    public function votePost(Request $req)
    {
        //types time-expire, otp, success, error,
        // 0. Voting Time Validation
        // 1. validate mobile number, 
        // 2. Validate VoterID
        // 3. Validate OTP
        
        $returnData = [
            'type'      => 'success',
            'message'   => 'Voting Success.'
        ];
        $returnData['type'] = 'success';
        return response()->json($returnData);
    }
}
