<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Validator; 
use App\User;
use App\VerifyUser;
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

				$verifyUser = VerifyUser::create([
		            'user_id' => $user->id,
		            'token' => str_random(40)
		        ]);
 
				$user_data = [

					'name' => $request['name'],
					'email' => $request['email'],
					'base_url' => \URL::to('/'),
					'logo_url' => \URL::to('/'). '/public/images/logo.png',
					'token' => $user->verifyUser->token,
				];

				try {

					//print_r($user_data['email']); print_r(env('MAIL_USERNAME')); print_r(env('MAIL_FROM_NAME'));exit;

					$sent = Mail::send('emails.welcome', $user_data, function($message) use ($user_data) {

						$message->to(@$user_data['email'], $user_data['name'])->subject('Druck - EMail verification');
						$message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
					});

					return redirect()->back()->with('success', 'You need to confirm your account. We have sent you an activation code, please check your email.');

				} catch (Exception $e) {

                //Avoid error   

				} 
			} 

			// Auth::loginUsingId($user->id,true);

			// if(Auth::check()){
			// 	return redirect()->route('index');       
			// }

		} else{
			return back()->withInput()->with('errors', $validator->errors());

		}

	} 
   

	public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();  //dd($verifyUser);
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";  //dd($status);

                $user_details = User::where(['id' => $verifyUser->user_id])->first();

                $user_data = [

					'name' => $user_details->name,
					'email' => $user_details->email,
					'base_url' => \URL::to('/'),
					'logo_url' => \URL::to('/'). '/public/images/logo.png',
				];

				try {

					//print_r($user_data['email']); print_r(env('MAIL_USERNAME')); print_r(env('MAIL_FROM_NAME'));exit;

					$sent = Mail::send('emails.verified', $user_data, function($message) use ($user_data) {

						$message->to(@$user_data['email'], $user_data['name'])->subject('Welcome to Druckshop');
						$message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
					});

					return redirect()->back()->with('success', 'You need to confirm your account. We have sent you an activation code, please check your email.');

				} catch (Exception $e) {

                //Avoid error   

				} 



            }else{
                $status = "Your e-mail is already verified. You can now login."; //dd($status);
            }
        }else{  
           // return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
            return redirect()->route('login')->with('warning', "Sorry your email cannot be identified.");
        }
      //dd("here");
      //  return redirect('/login')->with('status', $status);
        return redirect()->route('login')->with('status', $status);

    }




}
