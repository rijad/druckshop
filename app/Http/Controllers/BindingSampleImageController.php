<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BindingSampleImage;
use \Exception;

class BindingSampleImageController extends Controller
{
    public function getSampleImage(Request $request){

    try{
    	$data = BindingSampleImage::where(['product_id' => $request->binding, 'pageformat_id' => $request->page_format, 'covercolor_id' => $request->cover_color])->first(); 

    	$image_path = $data->image;

    	if(!empty($image_path)){
    		$image_path = $data->image; print_r($image_path);	
    	}else{
    		$image_path = ""; print_r($image_path);
    	}
 
    }catch(\Exception $e){
    	$image_path = "";  print_r($image_path);
    }
     


    }
}
 