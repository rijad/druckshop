<?php

if (! function_exists('returnResponse')) {
	function returnResponse($data = '', $code = '', $message = ''){

		return json_encode(array('data'=>$data,"status"=>$code,"message"=>$message));
	}
}

function productNameById($product_id){
	$product = \App\Product::find($product_id);
	//dd($product->title_english);
	echo $product->title_english;
}

function pageformatById($pageformat_id){
	$format = \App\PageFormat::find($pageformat_id);
	echo $format->page_format;
}

function colorById($covercolor_id){
	$color = \App\CoverColor::find($covercolor_id);
	echo $color->color;
}