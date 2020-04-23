<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NewsLetter;

use Mail;

class NewsletterController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {

        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletter = NewsLetter::all();
        return view('/pages/admin/newsletter',compact('newsletter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function sendMail(Request $request) {

        if ($request) {

            $data = NewsLetter::where('email', $request->email)->first();

            if (!empty($data)) {

                $user_data = [

                    'name' => 'User',
                    'email' => $data->email,
                    'description' => @$request->description,
                    'base_url' => \URL::to('/'),
                    'logo_url' => \URL::to('/'). '/public/images/logo.png',
                ];

                try {

                    $sent = Mail::send('emails.newsletter', $user_data, function($message) use ($user_data) {

                        $message->to(@$user_data['email'], $user_data['name'])->subject('Druckshop - Newsletter Reply');
                        $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
                    });

                } catch (Exception $e) {

                //Avoid error 

                }               
            }
        }

        return redirect('/admin/newsletter');

    }




}
