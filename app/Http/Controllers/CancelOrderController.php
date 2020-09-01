<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderDetailsFinal; 
use App\OrderHistory; 
use App\User; 
use Auth;


use Mail;

class CancelOrderController extends Controller
{
    public function CancelOrder(Request $request){

        if(Auth::check()) 
         {
             $user_id = Auth::user()->id;
         }else{return redirect()->route('index');}

         $OrderDetails = OrderDetailsFinal::where(['order_id' => $request->order_id , 'user_id'=>$user_id])->first();

         $UpdateState = $OrderDetails;
         $UpdateState->state = "Cancelled";
         $update = $UpdateState->save();

         if ($update) {


             $order_history = OrderHistory::where(['order_id' => $request->order_id])->get()->toArray();

             $data = User::where(['id' => $user_id])->first();

             if (!empty($data) && !empty($order_history)) {

                $user_data = [

                    'name' => @$data->name,
                    'email' => @$data->email,
                    'order_id' => $request->order_id,
                    'base_url' => \URL::to('/'),
                    'logo_url' => \URL::to('/'). '/public/images/logo.png',
                    'order_history' => $order_history,
                ];


                try {

                    $sent = Mail::send('emails.cancel_order', $user_data, function($message) use ($user_data) {

                        $message->to($user_data['email'], $user_data['name'])->subject('Druckshop - Order Cancelled');
                        $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
                    });

                    return redirect()->route('customer-area');
                } catch (Exception $e) {

                //Avoid error 

                }


            }

        }


        return redirect()->route('customer-area');



    }
}
