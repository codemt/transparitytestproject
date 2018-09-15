<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\User;
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
        $users = User::all();
        foreach ($users as $user) {

            // if($user->approved == 1 ){

                if(Auth::attempt(['firstname'=>$request->firstname,'password'=>$request->password,'approved'=>1])){
    
                    return redirect('user/dashboard')->with('Status','You are Logged in.');
        
                }
                
            // } 

            if($user->approved == 0 )
            {
    
                return redirect('/')->with('Status','User is not Approved by Admin');
    
            }
           
        }

       return redirect('/')->with('Status','User is not Approved by Admin');

        

    }
}
