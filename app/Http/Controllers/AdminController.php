<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admins;
use App\User;
class AdminController extends Controller
{
    //
    public function login(){

        return view('admin.login');

    }
    public function index(Request $request){




        $this->validate($request,[
            'firstname' => 'required|max:255',
            'password' => 'required|max:255'
        ]);
        
        if(Auth::attempt(['firstname'=>$request->firstname,'password'=>$request->password,'role'=>'admin'])){

            $users = User::all();
            return redirect('admin/dashboard')->with('users',$users);

        }
       else return redirect('/')->with('Status','Admin not Found');


    }
    public function approval(Request $request){


        $users = User::find($request->commentId);
        $approveVal = $request->input('approved');
        if($approveVal == 'on'){
            $approveVal = 1;
        }
        else{

                $approveVal=0;

        }
        $users->approved=$approveVal;

        $users->save();


        return back();

    }
}
