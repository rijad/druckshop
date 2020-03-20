<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderDetailsFinal; 
use Auth;
 
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
    $UpdateState->save();

    return redirect()->route('customer-area');



	}
}
