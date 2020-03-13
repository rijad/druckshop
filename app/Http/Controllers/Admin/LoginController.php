<?php

namespace App\Http\Controllers\Admin;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Notifiable;

class LoginController extends Controller
{
    public function authenticate(Request $request) {

      $status = Auth::guard('admin')->attempt([
      'email'=>$request->email,
      'password'=>$request->password,

    ]); //dd($status);
 
    if($status){
    	//return redirect('/dashboard');
    	return redirect()->route('dashboard');
    } 

    return redirect()->back()->with('fail','Please input correct details and try again.');

 }

 public function logout(){
 
    Auth::guard('admin')->logout();
    return redirect()->route('index');
    //return redirect()->back();

 }
}
 