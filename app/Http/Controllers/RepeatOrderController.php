<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderHistory;
use App\OrderAttributes;
use App\DeliveryService;
use Auth;
 
class RepeatOrderController extends Controller
{
   public function RepeatOrder(Request $request){

   	if(Auth::check()) 
	{
	$user_id = Auth::user()->id;
	}else{return redirect()->route('index');}

	try{

		$RepeatOrderDetails = OrderHistory::where(['order_id' => $request->order_id , 'user_id'=>$user_id])->get();

		foreach($RepeatOrderDetails as $order){
			$OrderRepeat = new OrderAttributes;
			$OrderRepeat->user_id = $order->user_id;
			$OrderRepeat->product= $order->product;
			$OrderRepeat->attribute = $order->product_attribute;
			$OrderRepeat->product_id =$order->product_id;
			$OrderRepeat->quantity= $order->quantity;
			$OrderRepeat->attribute_desc= $order->attribute_desc;
			$OrderRepeat->price_per_product= $order->price_per_product;
			$OrderRepeat->price_product_qty= $order->price_product_qty;
			$OrderRepeat->quantity= $order->quantity; 
			$OrderRepeat->status= $order->status;
			$OrderRepeat->save();
		}

		return redirect()->route('cart');

	}catch(Exception $e){

		return redirect()->route('index'); 

	}
   	



   }
}
