<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderDetailsFinal;
use Auth;

class CustomerAreaController extends Controller
{
	public function index(){

		if(!Auth::check()){
			return redirect()->route('index');       
		}
 
		
		$OrderHistory = OrderDetailsFinal::where(['user_id'=>Auth::user()->id])->with('orderProductHistory')->get();

		//print_r($OrderHistory->toArray()); exit;

		return view('/pages/front-end/customer-area',compact('OrderHistory'));
	}
}
  // trantor^45

