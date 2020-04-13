<?php

if (! function_exists('returnResponse')) {
	function returnResponse($data = '', $code = '', $message = ''){

		return json_encode(array('data'=>$data,"status"=>$code,"message"=>$message));
	}
}

function productNameById($product_id){
	$product = \App\Product::find($product_id);
	return $product->title_english;
}

function pageformatById($pageformat_id){
	$format = \App\PageFormat::find($pageformat_id);
	return $format->page_format;
}

function colorById($covercolor_id){
	$color = \App\CoverColor::find($covercolor_id);
	return $color->color;
}

function sheetById($coversheet_id){
	$sheet = \App\CoverSheet::find($coversheet_id);
	return $sheet->sheet;
}

function weightById($weight_id){
	$weight = \App\PaperWeight::find($weight_id);
	return $weight->paper_weight;
}

function backcoverById($backcover_id){
	$backcover = \App\BackCovers::find($backcover_id);
	return $backcover->back_cover;
}

function optionsById($options_id){
	$options = \App\PageOptions::find($options_id);
	return $options->page_options;
}

function mirrorById($mirror_id){
	$mirror = \App\Mirror::find($mirror_id);
	return $mirror->mirror;
}

function bagById($bag_id){
	$bag = \App\CdBag::find($bag_id);
	return $bag->bag;
}

function listById($list_id){
	$list = \App\DataCheck::find($list_id);
	return $list->check_list;
}

function showDetails($key, $id){
	if($id == -1){
		echo $key . ':' . $id;
		return;
	}

	switch ($key) {
		case 'binding':
			echo $key . ':' . productNameById($id);
			break;

		case 'page-format':
			echo $key . ':' . pageformatById($id);
			break;

		case 'cover-color':
			echo $key . ':' . colorById($id);
			break;

		case 'cover-sheet':
			echo $key . ':' . sheetById($id);
			break;

		case 'paper-weight':
			echo $key . ':' . weightById($id) . " g/m²";
			break;
			
		case 'back-cover':
			echo $key . ':' . backcoverById($id);
			break;
			
		case 'paper-options':
			echo $key . ':' . optionsById($id);
			break;
			
		case 'mirror':
			echo $key . ':' . mirrorById($id);
			break;
			
		case 'cd-bag':
			echo $key . ':' . bagById($id);
			break;
			
		case 'data_check':
			echo $key . ':' . listById($id);
			break;
		
		default:
		 echo $key . ':' . $id;
			break;
	}

}