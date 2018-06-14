<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator, Redirect, Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminController extends Controller
{
    function __construct(){
        $this->middleware('auth', ['except' => ['login']]);
    }
    public function index()
    {
        return view('admin.index');
    }
    public function login(Request $request) {
        $remember = false;
        if(isset($request->remember)){
            $remember = true;
        }
        $rule = [
            'username' => 'required|min:6',
            'password' => 'required|min:6'
        ];
        $validate = Validator::make($request->all(), $rule);
        if($validate->fails()){
            die("Validation failed.");
            // return Redirect::back()->withErrors($validate)->withInput()->with('alert_message', "Username or Password doesnot match.");
        }

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('admin.dashboard');
            // die("login");
        }else{
            // die("failde");
            return Redirect::back()->with('alert_message', "Username or Password doesnot match.");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.logout');
    }
    public function ChangePassword(Request $request){
        $rule = [
            'old_password'          => 'required|min:6',
            'new_password'          => 'required|min:6|confirmed',
        ];
        $validate = Validator::make($request->all(), $rule);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate);
        }
        $user_pass = Auth()->user()->password;
        if(Hash::check($request->old_password, $user_pass)){
            $alert = "alert-success";
            $user = Auth::user();
            $user->password = bcrypt($request->new_password);
            if($user->save()){
                return redirect()->back()->with('message', "Password Successfully Changed")->with('alert', $alert);
            }
        }else{
            $alert = 'alert-danger';
            return redirect()->back()->with('message', "Woops Something went wrong! please try again later.")->with('alert', $alert);
        }
    }
    public function showCreate(){
        return view('show.index');
    }
}
