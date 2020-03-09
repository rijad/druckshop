<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
 
class ProductController extends Controller
{ 
    public function sendData()
    {
    	$product_listing = Product::where('status', '1')->get();
        return view('/pages/front-end/products',compact('product_listing'));
    }
}
    