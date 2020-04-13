<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\OrderReturn;
use App\OrderDetailsFinal;
 
class ReturnOrderController extends Controller
{
    public function ReturnOrder(Request $request){

    	// Create Folder
    	if (!file_exists(public_path().'/returnrequest')) {
		 	mkdir(public_path().'/returnrequest', 0777); 
		 } 

		 // upload file
	     move_uploaded_file($_FILES['file']['tmp_name'], public_path().'/returnrequest/' . time() . '_' . $_FILES['file']['name']);

	 	// Insert data
	 	$ReturnOrder = new OrderReturn;
		$ReturnOrder->user_id = $request->input('user_id');
		$ReturnOrder->order_id = $request->input('order_id');
		$ReturnOrder->return_desc = $request->input('desc');
		$ReturnOrder->image_path = 'public/returnrequest/' . time() . '_' . $_FILES['file']['name'];
		$ReturnOrder->status= "Reversal Request";
		$ReturnOrder->save();


		$ReturnOrderStatus = OrderDetailsFinal::where(['order_id' => $request->input('order_id')])->first();

		$status = $ReturnOrderStatus;
		$status->state = "Reversal Request";
		$status->save();

		$response = returnResponse('','200','Success');
		print_r($response); exit;

    }


    
}
 