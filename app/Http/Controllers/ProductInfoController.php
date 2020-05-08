<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductInfoController extends Controller
{
     public function sendData()
    {
        try{
            $product_listing = Product::where('status', '1')->get();
        }catch (Exception $e) {
            $product_listing = [];
        }
        return view('/pages/front-end/product-info',compact('product_listing'));
    }
}
 