<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use Illuminate\Http\Request;
use DB;
use Auth;
use Hash;
use Carbon;
use App\User;

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




}