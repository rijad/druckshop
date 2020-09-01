<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\OrderReturn;
use App\OrderDetailsFinal;
use App\OrderHistory; 
use App\User;

use Mail;
 
class ReturnOrderController extends Controller
{
    public function ReturnOrder(Request $request){

    	// Create Folder
    	if (!file_exists(public_path().'/returnrequest')) {
		 	mkdir(public_path().'/returnrequest', 0777); 
		 } 

		 // upload file
	     move_uploaded_file($_FILES['file']['tmp_name'], public_path().'/returnrequest/' . time() . '_' . preg_replace('/\s+/', '_', $_FILES['file']['name']));

	 	// Insert data
	 	$ReturnOrder = new OrderReturn;
		$ReturnOrder->user_id = $request->input('user_id');
		$ReturnOrder->order_id = $request->input('order_id');
		$ReturnOrder->return_desc = $request->input('desc');
		$ReturnOrder->image_path = 'public/returnrequest/' . time() . '_' . preg_replace('/\s+/', '_', $_FILES['file']['name']);
		$ReturnOrder->status= "Reversal Request";
		$ReturnOrder->save();


		$ReturnOrderStatus = OrderDetailsFinal::where(['order_id' => $request->input('order_id')])->first();

		$status = $ReturnOrderStatus;
		$status->state = "Reversal Request";
		$update = $status->save();

		if ($update) {

             $order_history = OrderHistory::where(['order_id' => $request->input('order_id')])->get()->toArray();

             $data = User::where(['id' => $request->input('user_id')])->first();

             if (!empty($data) && !empty($order_history)) {

                $user_data = [

                    'name' => @$data->name,
                    'email' => @$data->email,
                    'order_id' => $request->input('order_id'),
                    'base_url' => \URL::to('/'),
                    'logo_url' => \URL::to('/'). '/public/images/logo.png',
                    'order_history' => $order_history,
                ];


                try {

                    $sent = Mail::send('emails.return_order', $user_data, function($message) use ($user_data) {

                        $message->to($user_data['email'], $user_data['name'])->subject('Druckshop - Order Cancelled');
                        $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
                    });

                    return redirect()->route('customer-area');
                } catch (Exception $e) {

                //Avoid error 

                }


            }

        }

		$response = returnResponse('','200','Success');
		print_r($response); exit;

    }


    
}
 