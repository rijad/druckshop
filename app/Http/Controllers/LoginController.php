<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; 
use App\User;
 
class LoginController extends Controller
{

    public function authenticate(Request $request) {

      try{

       $verify = User::where(['email' => $request->email])->first()->verified;  
       //dd( ! $verify);

      }catch (Exception $e) {
        return redirect()->back()->with('warning', 'You need to Verify your e-mail.');
      }


       if( ! $verify){

        return redirect()->back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
        
      }else{

            $status = Auth::attempt([ 
            'email'=>$request->email,
            'password'=>$request->password,
            ]); 

            if($status){
             return redirect('/'); 
            } 
      }


    return redirect()->back()->with('fail','Please input correct details and try again.');

 }

 public function logout(){
 
    Auth::logout();
    return redirect()->back();

 }

}
 