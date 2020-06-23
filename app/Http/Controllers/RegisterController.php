<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Validator; 
use App\User;
use Auth;

use Mail;


class RegisterController extends Controller
{
	public function validateRegister(Request $request){ 
		
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'password' => 'required|min:8',                
			'password_confirmation' => 'required|min:8|same:password',
			'email' => 'required|email|unique:users',
		]);

		$input = $request->all();
		$input['password'] = \Hash::make($request['password']);

		if ($validator->passes()){

			$response = returnResponse($input,'200','User Created Successfully');
			$user = User::create($input);

			// send welcome mail
			if (!empty($user)) {

				$user_data = [

					'name' => $request['name'],
					'email' => $request['email'],
					'base_url' => \URL::to('/'),
					'logo_url' => \URL::to('/'). '/public/images/logo.png',
				];

				try {

					$sent = Mail::send('emails.welcome', $user_data, function($message) use ($user_data) {

						$message->to(@$user_data['email'], $user_data['name'])->subject('Welcome to Druckshop');
						$message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
					});

				} catch (Exception $e) {

                //Avoid error 

				} 
			}

			Auth::loginUsingId($user->id,true);

			if(Auth::check()){
				return redirect()->route('index');       
			}

		} else{
			return back()->withInput()->with('errors', $validator->errors());

		}

	}




}
