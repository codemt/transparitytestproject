<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class RegisterController extends Controller
{
    //
    public function register(){

            return view('register');

    }
    public function store(Request $request){

       
    
        $this->validation($request);
       //return $request->all();
       $user = new User();
       $user->firstname=$request->input('firstname');
       $user->lastname=$request->input('lastname');
       $user->mobile=$request->input('mobile');
       $user->password=bcrypt($request->input('password'));
       $user->save();
        return redirect('/')->with('Status','You are registered , Wait for Admin approval before Logging in.');
      // return view('register');

    }
    public function validation($request){


        return $this->validate($request,[
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'mobile'=>'required|max:11',
            'password'=>'required|confirmed|max:255'
        ]);

    }
}
