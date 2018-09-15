<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    //
    public function userlogin(Request $request){



            return view('user.login');

    }
    public function validateuser(Request $request){


         $this->validate($request,[
            'firstname' => 'required|max:255',
            'password' => 'required|max:255'
        ]);
        if(Auth::attempt(['firstname'=>$request->firstname,'password'=>$request->password])){

            return redirect('user/dashboard')->with('Status','You are Logged in.');

        }
        else return ('Something Went Wrong');

    }
}
