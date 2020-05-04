<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\OrderDetailsFinal;
use App\UsersAdmin;
use App\OrderState;

use Auth;
use Mail;

class OrderController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
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
        $order = OrderDetailsFinal::all();
        return view('/pages/admin/order',compact('order'));
    }

    public static function users($id)  
    {
        $user = UsersAdmin::where(['id' => $id])->first();
        //dd($user);

        if(! empty($user->name)){
            return $user->name;
        }else{
            return "";
        }
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
    public function edit(Request $request, $id)
    {
        // dd($request->order_id);
        $users = UsersAdmin::where('status', '1')->get();
        $orderstate = OrderState::where('status', '1')->get();
        $orderhistory = OrderDetailsFinal::with('orderProductHistory')
        ->where(['order_id' => $request->order_id ])
        ->first();

       // dd($orderhistory);
        return view('/pages/admin/orderdetails',compact('orderhistory', 'users', 'orderstate'));
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
        // dd($request->all());
        $order = OrderDetailsFinal::find($id);

        $validator = Validator::make($request->all(), [
            'state' => 'required',
            'priority' => 'required',
            'assigned_to' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
        $order->state = $request->state;
        $order->priority = $request->priority;
        $order->assigned_to = $request->assigned_to;
        $order->save();

        return redirect()->back()->with('status' , 'Updated');

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

    public function sendDefectedOrderEmail(Request $request, $user_id = '', $order_id = '', $old_file_name = ''){

        if (!empty($order_id) && !empty($old_file_name) && !empty($user_id)) {

            $data = User::where(['id' => $user_id])->first();

            $url = url("/defectfile/".$order_id."/".$old_file_name);

            if (!empty($data)) {

                $user_data = [

                    'name' => @$data->name,
                    'email' => @$data->email,
                    'order_id' => $order_id,
                    'action_url' => @$url,
                    'base_url' => \URL::to('/'),
                    'logo_url' => \URL::to('/'). '/public/images/logo.png',
                ];

                try {

                    $sent = Mail::send('emails.defect_file', $user_data, function($message) use ($user_data) {

                        $message->to($user_data['email'], $user_data['name'])->subject('Druckshop - Defect File');
                        $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
                    });

                    return redirect()->back()->with('status' , 'Mail Sent !!');

                } catch (Exception $e) {

                //Avoid error 

                }


            }
            
        }

        return redirect()->back()->with('error' , 'Something went wrong, Please try again !!');
    }



     public function trackingNumberSendMail(Request $request) {

        if ($request) {

            $data = $data = User::where(['id' => $request->user])->first();
            $url = $request->tracking_link;

            if (!empty($data)) {

                $user_data = [

                    'name' => @$data->name,
                    'email' => $data->email,
                    'description' => @$request->description,
                    'order_id' => @$request->order_id,
                    'action_url' => @$url,
                    'base_url' => \URL::to('/'),
                    'logo_url' => \URL::to('/'). '/public/images/logo.png',
                ];

                try { 

                    $sent = Mail::send('emails.tracking_link', $user_data, function($message) use ($user_data) {

                        $message->to(@$user_data['email'], $user_data['name'])->subject('Druckshop - Order Tracking');
                        $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
                    });

                     return redirect()->back()->with('status' , 'Mail Sent !!');

                } catch (Exception $e) {

                //Avoid error 

                }               
            }
        }

         return redirect()->back()->with('error' , 'Something went wrong, Please try again !!');

    }



}
