<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; 
 
class LoginController extends Controller
{

    public function authenticate(Request $request) {

      $status = Auth::attempt([ 
      'email'=>$request->email,
      'password'=>$request->password,

    ]); 

    if($status){
    	return redirect('/');
    } 

    return redirect()->back()->with('fail','Please input correct details and try again.');

 }

 public function logout(){
 
    Auth::logout();
    return redirect()->back();

 }

}
 