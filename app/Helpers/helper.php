<?php

if (! function_exists('returnResponse')) {
	function returnResponse($data = '', $code = '', $message = ''){

		return json_encode(array('data'=>$data,"status"=>$code,"message"=>$message));
	}
}

function productNameById($product_id){
	$product = \App\Product::find($product_id);
	$locale = session()->get('locale'); 
		if ($locale == 'gr') { 
	return $product->title_german;
	}else{
		return $product->title_english;
	}
}

function pageformatById($pageformat_id){
	$format = \App\PageFormat::find($pageformat_id);
	$locale = session()->get('locale'); 
		if ($locale == 'gr') {
	return $format->name_german;
	}else{
		return $format->name_english;
	}

}

function colorById($covercolor_id){
	$color = \App\CoverColor::find($covercolor_id);
	$locale = session()->get('locale'); 
		if ($locale == 'gr') {
	return $color->name_german;
	}else{
		return $color->name_english;
	}
}

function sheetById($coversheet_id){
	$sheet = \App\CoverSheet::find($coversheet_id);
	$locale = session()->get('locale'); 
		if ($locale == 'gr') {
	return $sheet->name_german;
	}else{
		return $sheet->name_english;
	}
}

function weightById($weight_id){
	$weight = \App\PaperWeight::find($weight_id);
	$locale = session()->get('locale'); 
		if ($locale == 'gr') {
	return $weight->name_german;
	}else{
		return $weight->name_english;
	}
}

function backcoverById($backcover_id){
	$backcover = \App\BackCovers::find($backcover_id);
	$locale = session()->get('locale'); 
		if ($locale == 'gr') {
	return $backcover->name_german;
	}else{
		return $backcover->name_english;
	}
}

function optionsById($options_id){
	$options = \App\PageOptions::find($options_id); 
	$locale = session()->get('locale'); 
		if ($locale == 'gr') {
	return $options->name_german;
	}else{
		return $options->name_english;
	}
}

function mirrorById($mirror_id){
	$mirror = \App\Mirror::find($mirror_id);
	$locale = session()->get('locale'); 
		if ($locale == 'gr') {
	return $mirror->name_german;
	}else{
		return $mirror->name_english;
	}
}

function bagById($bag_id){
	$bag = \App\CdBag::find($bag_id);
	$locale = session()->get('locale'); 
		if ($locale == 'gr') {
	return $bag->name_german;
	}else{
		return $bag->name_english;
	}
}

function listById($list_id){
	$list = \App\DataCheck::find($list_id);
	$locale = session()->get('locale'); 
		if ($locale == 'gr') {
	return $list->name_german;
	}else{
		return $list->name_english;
	}
}

function deliveryServiceById($list_id){
	$list = \App\DeliveryService::find($list_id);
	$locale = session()->get('locale'); 
		if ($locale == 'gr') {
	return $list->name_german;
	}else{
		return $list->name_english;
	}
}


function emailById($list_id){
	$list = \App\User::find($list_id);
	return $list->email;
}

function showDetails($key, $id){
	if($id == -1){
		echo $key . ': ' . " N/A";
		return;
	}

	switch ($key) {
		case 'binding':
			echo $key . ': ' . productNameById($id);
			break;

		case 'page-format':
			echo $key . ': ' . pageformatById($id);
			break;

		case 'cover-color':
			echo $key . ': ' . colorById($id);
			break;

		case 'cover-sheet':
			echo $key . ': ' . sheetById($id);
			break;

		case 'paper-weight':
			echo $key . ': ' . weightById($id) . " g/m²";
			break;
			
		case 'back-cover':
			echo $key . ': ' . backcoverById($id);
			break;
			
		case 'page_options':
			echo $key . ': ' .optionsById($id);
			break;
			 
		case 'mirror':
			echo $key . ': ' . mirrorById($id);
			break;
			
		case 'cd-bag':
			echo $key . ': ' . bagById($id);
			break;
			
		case 'data_check':
			echo $key . ': ' . listById($id);
			break;
		
		default:
		 echo $key . ': ' . $id;
			break;
	}

}

function customer($id)  
    {
        $user = \App\User::where(['id' => $id])->first();
        //dd($user);

        if(! empty($user->name)){
            return $user->name;
        }else{
            return "";
        }
	} 

function getEmbossingById($id){

	$list = \App\ArtList::find($id);
	return $list->name_english;  

} 

function getFreeSampleImage($id){

	$image = \App\Product::where(['id' => $id])->first('image_path');
	return $image->image_path;
	
}   

 function getShippingCompanyById($id){

	$shippingCompany = \App\DeliveryService::find($id);
	return $shippingCompany['delivery_service'];
} 

function changeTimeZone($dateString){

  $timeZoneSource = null;

  $timeZoneTarget = 'Europe/Busingen';

  if (empty($timeZoneSource)) {
    $timeZoneSource = date_default_timezone_get();
  }
  if (empty($timeZoneTarget)) {
    $timeZoneTarget = date_default_timezone_get();
  }

  $dt = new DateTime($dateString, new DateTimeZone($timeZoneSource));  //dd($dt);
  $dt->setTimezone(new DateTimeZone($timeZoneTarget));

  return $dt->format("Y-m-d H:i:s");
}

function countCustomers(){
	$cust = \App\User::with('customer')->count();
	return $cust;
}

function countOrders(){
	$order = \App\OrderDetailsFinal::count();
	return $order;
}

function countPending(){
	$order = \App\OrderDetailsFinal::where('state', 'New')
			->orwhere('state', 'In-Progress')->count();
	return $order;
}

function countCompleted(){
	$order = \App\OrderDetailsFinal::where('state', 'Done')->count();
	return $order;
}

function countReturn(){
	$order = \App\OrderReturn::count();
	return $order;
}

function countPayment(){
	$order = \App\Payment::where('status', 'Completed')->count();
	return $order;
}
