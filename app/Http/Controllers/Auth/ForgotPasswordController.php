<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use Illuminate\Http\Request;
use DB;
use Auth;
use Hash;
use Carbon;
use Mail;

use App\User;
use App\UsersAdmin;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }



    public function showPasswordResetForm(Request $request) {

        // $user = User::where ('email', $request->email)-first();
        // if ( !$user ) return redirect()->back()->withErrors(['error' => '404']);

        $tokenData = DB::table('password_resets')
        ->where('token', $request->token)->first();

        $token = @$tokenData->token;

        return view('auth.passwords.reset', compact('token'));

    }

    public function updatePassword(Request $request) {

        // $user = User::where ('email', $request->email)-first();
        // if ( !$user ) return redirect()->back()->withErrors(['error' => '404']);

        $tokenData = DB::table('password_resets')
        ->where('token', $request->resetToken)->first();

        if (!empty($tokenData)) {

            $password = $request->password_confirmation;

            $update = User::where(['email' => $tokenData->email])->update(['password' => Hash::make($password)]);

            if ($update) {

                $delete = DB::table('password_resets')->where(['email' => $tokenData->email])->delete();
            }

            return redirect('/')->with('MessageAlert', 'Your password has been reset successfull !!');
        }

        
    }


    public function adminEmail(Request $request) {


        return view('auth.passwords.admin_email');
    }

    public function sendAdminEmail(Request $request) {

        $validator = Validator::make($request->all(), [

            'email' => 'required|email|exists:users_admin',
        ]);

        if ($validator->fails()) {

            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        if ($request->email) {

            $tokenData = \DB::table('password_resets')
            ->insert(['email'=>$request->email, 'token' => $request->_token]);

            $user = UsersAdmin::where(['email' => $request->email])->first();
            $user_data = [

                'name' => @$user->name,
                'email' => $request->email,
                'base_url' => \URL::to('/'),
                'actionUrl' => url("/adminPasswordReset/?token=" . $request->_token),
                'logo_url' => \URL::to('/'). '/public/images/logo.png',
            ];

            try {

                $sent = Mail::send('emails.admin-reset', $user_data, function($message) use ($user_data) {

                    $message->to(@$user_data['email'], $user_data['name'])->subject('Reset Password Notification');
                    $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
                });

            } catch (Exception $e) {

                //Avoid error 

            }

            return redirect()->back()->with('message', 'Reset link has been sent on your email, Please check your email !!');

        }

        return redirect()->back();


    }

    public function adminPasswordReset(Request $request) {

        // $user = User::where ('email', $request->email)-first();
        // if ( !$user ) return redirect()->back()->withErrors(['error' => '404']);

        $tokenData = DB::table('password_resets')
        ->where('token', $request->token)->first();

        $token = @$tokenData->token;

        return view('auth.passwords.admin-reset', compact('token'));

    }

    public function updateAdminPassword(Request $request) {

        // $user = User::where ('email', $request->email)-first();
        // if ( !$user ) return redirect()->back()->withErrors(['error' => '404']);

        $tokenData = DB::table('password_resets')
        ->where('token', $request->resetToken)->first();

        if (!empty($tokenData)) {

            $password = $request->password_confirmation;

            $update = UsersAdmin::where(['email' => $tokenData->email])->update(['password' => Hash::make($password)]);

            if ($update) {

                $delete = DB::table('password_resets')->where(['email' => $tokenData->email])->delete();
            }

            return redirect('/')->with('MessageAlert', 'Your password has been reset successfull !!');
        }

        
    }




}