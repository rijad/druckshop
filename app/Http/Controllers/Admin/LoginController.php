<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Notifiable;


use Illuminate\Foundation\Auth\AuthenticatesUsers;


use Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
  use AuthenticatesUsers;

  protected $redirectTo = '/';

  public function __construct() {

   $this->middleware('guest')->except('logout');

        //For admin
   $this->middleware('guest:admin')->except('logout');

  }


    public function authenticate(Request $request) {

      $validatedData = $this->validate($request, [

        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);

      if (Auth::guard('admin')->attempt(['email' => trim($request->email), 'password' => trim($request->password)])) {

        return redirect()->intended('/admin/dashboard');
      }else {

        $errors = ['Invalid Email or Password , Please try again.'];

        return Redirect::back()->withErrors($errors)->withInput($request->only('email', 'remember'));
      }

      return back()->withInput($request->only('email', 'remember'));

    }


    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function logout(){

      Auth::guard('admin')->logout();
      return redirect()->route('index');
    //return redirect()->back();

    }
  }
