<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Product;
use App\FrequentlyAskedQuestion;  

class IndexController extends Controller
{
    public function sendData()
    {
    	$slides = Slider::where('is_active', '1')->get();
    	$product_listing = Product::where('status', '1')->get();
    	$frequently_asked_question = FrequentlyAskedQuestion::where('status', '1')->get();
        
        return view('/pages/front-end/index',compact('slides','product_listing','frequently_asked_question'));
    }

}
   