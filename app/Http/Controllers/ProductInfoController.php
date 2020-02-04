<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductInfoController extends Controller
{
     public function show()
    {
    	$product_listing = Product::where('status', '1')->get();
        return view('/pages/front-end/product-info',compact('product_listing'));
    }
}
 