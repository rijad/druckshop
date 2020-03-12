<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Validator; 
use App\User;


class RegisterController extends Controller
{
    public function validateRegister(Request $request){ 
		
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'password' => 'required|min:8|max:14',                
			'password_confirmation' => 'required|min:8|max:14|same:password',
			'email' => 'required|email|unique:users',
		]);
		$input = $request->all();
		$input['password'] = \Hash::make($request['password']);
		//$user = User::create($input);
		if ($validator->passes()){
			$response = returnResponse($input,'200','User Created Successfully');
			$user = User::create($input);
			return back()->with('success', $response);
		}else{return back()->with('errors', $validator->errors());}
		//$response = returnResponse($validator->errors(),'401','Valiation Error');
		// dd($validator->errors());
		

		
	}
    
}
