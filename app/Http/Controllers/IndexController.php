<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider; 
use App\Product;
use App\FrequentlyAskedQuestion; 
use App\OrderAttributes;  
use Auth;

class IndexController extends Controller
{
    public function sendData()
    {
    	
    	if (Auth::check())
    	{
    		$user_id = Auth::user()->id;
    		$cart = OrderAttributes::where(['status'=>'1','user_id'=>$user_id])->get();
			try{
				$slides = Slider::where('is_active', '1')->orderBy('id', 'DESC')->get();
			}catch (Exception $e) {
				$slides = [];
			}
			try{
				$product_listing = Product::where('status', '1')->get();
			}catch (Exception $e) {
				$product_listing = [];
			}
			try{
    			$frequently_asked_question = FrequentlyAskedQuestion::where('status', '1')->get();
			}catch (Exception $e) {
				$frequently_asked_question = [];
			}

    		return view('/pages/front-end/index',compact('slides','product_listing','frequently_asked_question','cart'));
    	}else{

			try{
				$slides = Slider::where('is_active', '1')->orderBy('id', 'DESC')->get();
			}catch (Exception $e) {
				$slides = [];
			}
			try{
				$product_listing = Product::where('status', '1')->get();
			}catch (Exception $e) {
				$product_listing = [];
			}
			try{
				$frequently_asked_question = FrequentlyAskedQuestion::where('status', '1')->get();
			}catch (Exception $e) {
				$frequently_asked_question = [];
			}

    		return view('/pages/front-end/index',compact('slides','product_listing','frequently_asked_question'));

    	}

	
		
    	
    }

}
    