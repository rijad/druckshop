<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


use App;
use Auth;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth'); 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    //Lang
    public function lang($locale) {

        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }


    public function testMail(Request $request, $email = '') {

        if ($email) {

            $logo_url = \URL::to('/').'/public/images/ger.png'; //dynamic after live code

            // $user_id = Auth::user()->id;
            // $user_data = User::where(['id' => Auth::user()->id])->first();
            $user_data = User::where(['email' => $email])->first();

            $data = array('name'=>"Invoice", 'logo_url' => @$logo_url);

            $pdf_name = 'test.pdf';

            try {

                $sent = Mail::send('emails.invoice', $data, function($message) use ($user_data, $pdf_name) {

                    $message->to(@$user_data->email, $user_data->name)->subject('New Order Request');
                // $message->attach(public_path().'/secureFileUploads/pdfInvoiceFiles/'.@$pdf_name.'.pdf');
                    $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
                });

                dd('Sent email');

            } catch (Exception $e) {

                dd($e->getMessage());
                
            }

        }else{

            dd('Enter Email');
        }

    }



}
