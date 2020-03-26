<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 
use App\BackCovers;
use App\CdBag;
use App\CoverColor;
use App\CoverSheet;
use App\DataCheck;
use App\DeliveryService;
use App\Discount;
use App\KindList;
use App\LettesOfSpine; 
use App\PageFormat;
use App\PaperWeight;  
use App\ArtList;
use App\Product;
use App\ProductPageFormat;
use App\PageOptions;
use App\Mirror;
use App\Font;
use App\DateFormat;
use App\OrderAttributes;
use App\OrderDetails;
use App\Payment;
use App\OrderDetailsFinal;
use App\OrderHistory;
use App\ProductPaperWeight;
use App\User;
use Auth;
use Session; 
 

class CheckoutController extends Controller
{
	public function sendData()  
	{ 
		// $back_covers = BackCovers::where('status', '1')->get();
		 $cd_bag = CdBag::where('status', '1')->get();
		// $cover_color = CoverColor::where('status', '1')->get();
		// $cover_sheet = CoverSheet::where('status', '1')->get();
		 $data_check = DataCheck::where('status', '1')->get();
		// $delivery_service = DeliveryService::where('status', '1')->get();
		// $discount = Discount::where('status', '1')->get();
		// $kind_list = KindList::where('status', '1')->get();
		// $letters_of_spine = LettesOfSpine::where('status', '1')->get();
		// $paper_format = PageFormat::where('status', '1')->get();
		// $paper_weight = PaperWeight::where('status', '1')->get(); 
		// $art_list = ArtList::where('status', '1')->get();
		$product_listing = Product::where('status', '1')->get(); 
		$page_options = PageOptions::where('status', '1')->get(); 
		$fonts = Font::where('status', '1')->get(); 
		$date_format = DateFormat::where('status', '1')->get(); 

		// return view('/pages/front-end/checkout',compact('back_covers','cd_bag','cover_color','cover_sheet','data_check','delivery_service','discount','kind_list','letters_of_spine','paper_format','paper_weight','art_list','product_listing'));

		return view('/pages/front-end/checkout',compact('product_listing','page_options','fonts','date_format','data_check','cd_bag'));
	}

	public function getProductAttributes(Request $request){

		$page_format = ""; $cover_color = ""; $cover_sheet = ""; $back_cover = "";

		$product_attribute_relation = Product::find($request->id)->psProductAttribute()->get(['model','attribute','ps_product_attributes.id']);
		//$details = json_decode(json_encode($product_attribute_relation),true);

		foreach ($product_attribute_relation as $key => $attribute) {
			
			$product_attribute = $attribute['model'];

			if($product_attribute == "PageFormat"){

				$page_format = self::getPageFormat($request->id);

			}else if($product_attribute == "CoverColor"){

				$cover_color = self::getCoverColor($request->id);

			}else if($product_attribute == "CoverSheet"){

				$cover_sheet = self::getCoverSheet($request->id);

			}else if($product_attribute == "BackCovers"){

				$back_cover = self::getBackCover($request->id);

			}

		}

		$data = compact('page_format','cover_color','cover_sheet','back_cover');	 

		if (! empty($data)) {
			$response = returnResponse($data,'200','Success');
			print_r($response); exit;
		} else {
			$response = returnResponse('','404','No Data Found');
			print_r($response); exit;
		}
 
	} 


	public function getContentAttributes(Request $request){

		$paper_weight = ""; $mirror = "";
		$content_attribute_relation = PageOptions::find($request->id)->psPageOptionAttribute()->get(['model','attribute','ps_page_options_attributes.id']);

		foreach ($content_attribute_relation as $key => $attribute) {
			
			$content_attribute = $attribute['model'];

			if($content_attribute == "PaperWeight"){

				$paper_weight = self::getPageWeight($request->id);

			}else if($content_attribute == "Mirror"){

				$mirror = self::getMirror($request->id);

			} 
		}

			$data = compact('paper_weight','mirror');	 

		if (! empty($data)) {
			$response = returnResponse($data,'200','Success');
			print_r($response); exit;
		} else {
			$response = returnResponse('','404','No Data Found');
			print_r($response); exit;
		}

}


	public function getPageFormat($id = "", $call_by = 'self'){
		try{
			$page_format = Product::find($id)->psPageFormat()->get(['page_format','ps_page_format.id']);
			if($call_by == 'self') {
				return $page_format;
			} else {
				$response = returnResponse($page_format,'200','Success');
				print_r($response);
			}
		} catch (Exception $e) {
			return [];
		}
	}

	public function getCoverColor($id = "", $call_by = 'self'){
		try{
			$cover_color = Product::find($id)->psCoverColor()->get(['color','ps_cover_color.id']);
			if($call_by == 'self') {
				return $cover_color;
			} else {
				$response = returnResponse($cover_color,'200','Success');
				print_r($response);
			}
		}catch (Exception $e) {
			return [];
		}
 
	}

	public function getCoverSheet($id = "", $call_by = 'self'){
		try{

			$cover_sheet = Product::find($id)->psCoverSheet()->get(['sheet','ps_cover_sheet.id']);

			if($call_by == 'self') {
				return $cover_sheet;
			} else {
				$response = returnResponse($cover_sheet,'200','Success');
				print_r($response);
			}

		}catch (Exception $e){
			return [];
		}


	} 

	public function getBackCover($id = "", $call_by = 'self'){
		try{

			$back_covers = Product::find($id)->psBackCover()->get(['back_cover','ps_back_cover.id']);

			if($call_by == 'self') { 
				return$back_covers;
			} else {
				$response = returnResponse($back_covers,'200','Success');
				print_r($response);
			}

		}catch (Exception $e){
			return [];
		}

	}


	public function getPageWeight($id = "", $call_by = 'self'){
		try{
			$page_weight = PageOptions::find($id)->psPaperWeight()->get(['paper_weight','ps_paper_weight.id']);
			if($call_by == 'self') { 
				return $page_weight;
			} else {
				$response = returnResponse($page_format,'200','Success');
				print_r($response);
			}
		} catch (Exception $e) {
			return [];
		}
	}

	public function getMirror($id = "", $call_by = 'self'){
		try{
			$mirror = PageOptions::find($id)->psMirror()->get(['mirror','ps_mirror.id']);
			if($call_by == 'self') { 
				return $mirror;
			} else {
				$response = returnResponse($mirror,'200','Success');
				print_r($response);
			}
		} catch (Exception $e) {
			return [];
		}
	}

	public function getPrice(Request $request){
		$price_per_copy = 1; $price_per_cd=1; $price_data_check=0; $total = 0;
		$price_per_copy = ($request->paper_weight) * ($request->no_of_pages);
		$price_per_cd = ($request->no_of_cds) * (2.50);
		if($request->data_check == "1"){
			$price_data_check = 1;
		}else{
			$price_data_check = 5;
		}

		$total = $price_per_copy+$price_per_cd+$price_data_check;

		$data = compact('price_per_copy','price_per_cd','price_data_check','total');
		$response = returnResponse($data,'200','Success');
			print_r($response); exit;

	}

	public function saveOrder(Request $request){

		//$count = count($request->input());
		//dd(Auth::user()->id);   
		//dd($request->input()); 
		 
		$product_attribute = json_encode($request->input());
		
		$product = Product::where('id', $request->input('binding'))->first()->title_english;

		// foreach($request->input() as $key => $value){

		// 	$OrderAttributes = new OrderAttributes;
		// 	$OrderAttributes->user_id = Auth::user()->id;
		// 	$OrderAttributes->attribute = $key;
		// 	$OrderAttributes->value = $value;
		// 	$OrderAttributes->save();
 
		// }
 
		$product_details = "";

		foreach($request->input() as $key => $value){

			$str_arr = explode ("_", $key);  

			if(!is_null($value) && $value != "-1" && $key != "_token" && $key != "selectfile" && $str_arr[0] != "selectfile" && $key != "total"){

				$attribute_value = self::makeOrderDetails($key,$value);
				// make scentence for product details
				$product_details .= $key ." ".$attribute_value." ,";
			}
 
		}
 
		$qty = 1;

		if (Auth::check())
		{
			$user_id = Auth::user()->id;
	 //print_r($user_id);
		}else{
			$user_id = time();
			Session::put('user_id', $user_id);
		}
 //dd($product_attribute);
		$OrderAttributes = new OrderAttributes;
		$OrderAttributes->user_id = $user_id;
		$OrderAttributes->product= $product;
		$OrderAttributes->attribute = $product_attribute;
		//$OrderAttributes->product_id= $product."_".$user_id."_".time();
		$OrderAttributes->product_id = $request->input('binding');
		$OrderAttributes->quantity= $qty;
		$OrderAttributes->attribute_desc= $product_details;
		$OrderAttributes->price_per_product= $request->total;
		$OrderAttributes->price_product_qty= $request->total * $qty;
		$OrderAttributes->quantity= 1; 
		$OrderAttributes->status= 1;
		$OrderAttributes->save();


		session(['product_id' =>  $product."_".$user_id."_".time()]);

		

		//echo $product_details; 

		 //return view('/pages/front-end/cart',compact('product_data'));

		 return redirect()->route('cart');


		//dd($request->input()); 
 
}

public function cart(){  

	if (Auth::check()) 
    {
	 $user_id = Auth::user()->id;
	}else{$user_id = Session::get('user_id');}

	$product_data = OrderAttributes::where(['status'=>'1','user_id'=>$user_id])->get();
	$shipping_company = DeliveryService::all();
	return view('/pages/front-end/cart',compact('product_data','shipping_company'));

}

public function orderDetails(Request $request){

	$total = 0;
 
	if (Auth::check()) 
    {
	 $user_id = Auth::user()->id;
	}else{
		$user_id = Session::get('user_id');
	}

	$product_data = OrderAttributes::where('user_id', $user_id)->get();
	foreach($product_data as $value){

		$total += $value->price_product_qty;
 
	}  

	// Check if Guest already exists (using email id)
	// get already existing or new user_id
	if($user_id == Session::get('user_id')){

		$user_id = self::checkGuest($request->input('email_id'));
		// set new user id for Guest in tables
		self::setGuestUserid($user_id);
		//dd($user_id);

	}

	$validator = Validator::make($request->all(), [ 
			'no_of_copies' => 'required',
			'no_of_cds' => 'required',
			'email_id' => 'required|email',
			'shipping_company' => 'required|not_in:-1',
			'shipping_address' => 'required',                
			'billing_address' => 'required',
			'code' => 'nullable|exists:ps_discount',  
		]); 

		$input = $request->all();   

		//dd($input);

		if ($validator->passes()){ 

		// handling promo code
		  if($request->input('code') != "null" && ! empty($request->input('code'))){

		  	$discount = Discount::where(['code' => $request->input('code')])->first(['by_price','by_percent']);
			//dd($discount->by_price);
			if($discount->by_price != "null" && ! empty($discount->by_price)){
				$discount_amt = $discount->by_price;
			}else{
				$discount_amt = ($total / 100 ) * $discount->by_percent;
			}
				$net_amt = $total - $discount_amt;
		  }else{
		  	$discount_amt = 0.0;
		  	$net_amt = $total - $discount_amt;
		  }
			
			//dd($discount_amt);
			$input['user_id'] = $user_id;
			$input['order_id'] = $user_id.'_'.time();
			$input['total'] = $total;
			$input['promo_code'] = $request->input('code');

			Session::put('order_id', $user_id.'_'.time());
			
			$OrderDetailsvalue= OrderDetails::create($input);
			$product_data = OrderAttributes::where('user_id', $user_id)->get();

			return view('/pages/front-end/order',compact('product_data','discount_amt','total','net_amt'));
		}else{//dd($validator->errors());
			return back()->with('errors', $validator->errors());
		}


		// $OrderDetailsvalue = new OrderDetails;
		// $OrderDetailsvalue->user_id = $user_id;
		// $OrderDetailsvalue->order_id= $user_id.'_'.time();
		// $OrderDetailsvalue->no_of_copies= $request->no_of_copies;
		// $OrderDetailsvalue->no_of_cds= $request->no_of_cds;
		// $OrderDetailsvalue->shipping_company= $request->no_of_cds;
		// $OrderDetailsvalue->promo_code= $request->promo_code;
		// $OrderDetailsvalue->shipping_address= $request->shipping_address;
		// $OrderDetailsvalue->billing_address= $request->billing_address;
		// $OrderDetailsvalue->total= $total;
		// $OrderDetailsvalue->save();


	// 	$product_data = OrderAttributes::where('user_id', $user_id)->get();
	// return view('/pages/front-end/order',compact('product_data'));

}   //trantor@123
 

public function setQuantity(Request $request){

	//print_r($request->input('qty'));

	 $qty = $request->input('qty');
	 $total_price_per_product = $request->input('total_price_per_product');
	 if (Auth::check())
	 {
	 	$user_id = Auth::user()->id;
	 //print_r($user_id);
	 }else{$user_id = 0;}
	 $data = OrderAttributes::where('user_id', $user_id)->take($request->input('count'))->get();
	 //print_r($data);


	 $i = 0;
	 foreach($data as $value){

	 	$update_data = $value;
	 	$update_data->quantity = $qty[$i];
	 	$update_data->price_product_qty = $total_price_per_product[$i];
	 	$update_data->save();
	 	$i++;

	 }

	exit;

}


public function removeItem(Request $request){

	//dd($request->id);

	if (Auth::check())
	{
		$user_id = Auth::user()->id;
	 //print_r($user_id);
	}else{$user_id = 0;}

	$delete = OrderAttributes::destroy($request->id);
	// $product_data = OrderAttributes::where('user_id', $user_id)->get();
	// return view('/pages/front-end/cart',compact('product_data'));
	return redirect()->route('cart');

}


public function paymentPaypal(){

	if(Auth::check())
	{
	$user_id = Auth::user()->id;
	}else{return redirect()->route('index'); }

	$product_data = OrderAttributes::where('user_id', $user_id)->get();
	$order_details = OrderDetails::where(['user_id'=> $user_id , 'order_id' => Session::get('order_id')])->first();
	$net_amt = $order_details->total; 
	// handling promo code
	if($order_details->promo_code != "null" && ! empty($order_details->promo_code)){  

		$discount = Discount::where(['code' => $order_details->promo_code])->first(['by_price','by_percent']);
			//dd($discount->by_price);
		if($discount->by_price != "null" && ! empty($discount->by_price)){
			$discount_amt = $discount->by_price;
		}else{
			$discount_amt = ($order_details->total / 100 ) * $discount->by_percent;
		}
		$net_amt = $order_details->total - $discount_amt;
	}  //dd($net_amt);
	return view('/pages/front-end/payment_paypal',compact('product_data','order_details','net_amt'));

} 


public function paymentPaypalSuccess(Request $request){

	if(Auth::check())
	{
	$user_id = Auth::user()->id;
	}else{return redirect()->route('index'); }


	$order_details = OrderDetails::where('user_id', $user_id)->first();

	$order_details_amt = $order_details->total;
	$txn = $_GET['tx'];

	$payment = new Payment;
	$payment->order_id = $order_details->order_id;
	$payment->txn = $_GET['tx'];
	$payment->status = $_GET['st'];
	$payment->user_id = $user_id;
	$payment->amount = $_GET['amt']; 
	$payment->type = "paypal";
	$payment->save();


	$OrderDetails = OrderDetails::where('user_id', $user_id)->first();

	$OrderDetailsFinal = new OrderDetailsFinal;
		$OrderDetailsFinal->user_id = $user_id;
		$OrderDetailsFinal->order_id= $OrderDetails->order_id;
		$OrderDetailsFinal->no_of_copies= $OrderDetails->no_of_copies;
		$OrderDetailsFinal->no_of_cds= $OrderDetails->no_of_cds;
		$OrderDetailsFinal->shipping_company= $OrderDetails->shipping_company;
		$OrderDetailsFinal->promo_code= $OrderDetails->promo_code;
		$OrderDetailsFinal->shipping_address= $OrderDetails->shipping_address;
		$OrderDetailsFinal->billing_address= $OrderDetails->billing_address;
		$OrderDetailsFinal->total= $OrderDetails->total;
		$OrderDetailsFinal->status= $_GET['st'];
		$OrderDetailsFinal->txn= $_GET['tx'];
		$OrderDetailsFinal->state="New";
		$OrderDetailsFinal->assigned_to = 0;
		$OrderDetailsFinal->priority= "Normal";
		$OrderDetailsFinal->save();

	//$OrderDetailsFinal = $OrderDetails;

	$OrderAttributes = OrderAttributes::where(['status'=>'1','user_id'=>$user_id])->get();

	foreach($OrderAttributes as $order){
		$OrderHistory = new OrderHistory;
		$OrderHistory->user_id = $order->user_id;
		$OrderHistory->product= $order->product;
		$OrderHistory->attribute = $order->attribute;
		$OrderHistory->order_history_id= $OrderDetailsFinal->id;
		$OrderHistory->product_id =$order->product_id;
		$OrderHistory->quantity= $order->quantity;
		$OrderHistory->attribute_desc= $order->attribute_desc;
		$OrderHistory->price_per_product= $order->price_per_product;
		$OrderHistory->price_product_qty= $order->price_product_qty;
		$OrderHistory->quantity= $order->quantity; 
		$OrderHistory->status= $order->status;
		$OrderHistory->order_id= $OrderDetails->order_id;;
		$OrderHistory->save();
}


	$delete_cart = OrderAttributes::where(['user_id'=>$user_id])->delete();
	$delete_order_details = OrderDetails::where(['user_id'=>$user_id])->delete();

	$request->session()->forget('user_id');
	$request->session()->forget('order_id');

	return view('/pages/front-end/paypalsuccess',compact('order_details','order_details_amt','txn'));
	
}


public function cashOnDelivery(Request $request){
   
	if(Auth::check()) 
	{
	$user_id = Auth::user()->id; 
	}else{return redirect()->route('index');}
	
	$OrderDetails = OrderDetails::where(['user_id'=> $user_id , 'order_id' => Session::get('order_id')])->first();
	$net_amt = $OrderDetails->total; 
	// handling promo code
	if($OrderDetails->promo_code != "null" && ! empty($OrderDetails->promo_code)){  

		$discount = Discount::where(['code' => $OrderDetails->promo_code])->first(['by_price','by_percent']);
			//dd($discount->by_price);
		if($discount->by_price != "null" && ! empty($discount->by_price)){
			$discount_amt = $discount->by_price;
		}else{
			$discount_amt = ($OrderDetails->total / 100 ) * $discount->by_percent;
		}
		$net_amt = $OrderDetails->total - $discount_amt;
	}  //dd($net_amt);


	$order_details_amt = $OrderDetails->total;
	$txn = time();

	$payment = new Payment;
	$payment->order_id = $OrderDetails->order_id;
	$payment->txn = $txn;
	$payment->status = "Pending";
	$payment->user_id = $user_id;
	$payment->amount = $net_amt;  
	$payment->type = "COD";
	$payment->save();
 

	$OrderDetails = OrderDetails::where(['user_id'=> $user_id , 'order_id' => Session::get('order_id')])->first();

	$OrderDetailsFinal = new OrderDetailsFinal;
		$OrderDetailsFinal->user_id = $user_id;
		$OrderDetailsFinal->order_id= $OrderDetails->order_id;
		$OrderDetailsFinal->no_of_copies= $OrderDetails->no_of_copies;
		$OrderDetailsFinal->no_of_cds= $OrderDetails->no_of_cds;
		$OrderDetailsFinal->shipping_company= $OrderDetails->shipping_company;
		$OrderDetailsFinal->promo_code= $OrderDetails->promo_code;
		$OrderDetailsFinal->shipping_address= $OrderDetails->shipping_address;
		$OrderDetailsFinal->billing_address= $OrderDetails->billing_address;
		$OrderDetailsFinal->total= $OrderDetails->total;
		$OrderDetailsFinal->status= "Pending";
		$OrderDetailsFinal->txn= $txn;
		$OrderDetailsFinal->state="New";
		$OrderDetailsFinal->assigned_to = 0;
		$OrderDetailsFinal->priority= "Normal";
		$OrderDetailsFinal->save();

	//$OrderDetailsFinal = $OrderDetails;


	$OrderAttributes = OrderAttributes::where(['status'=>'1','user_id'=>$user_id])->get();

	foreach($OrderAttributes as $order){
		$OrderHistory = new OrderHistory;
		$OrderHistory->user_id = $order->user_id;
		$OrderHistory->product= $order->product;
		$OrderHistory->attribute = $order->attribute;
		$OrderHistory->order_history_id= $OrderDetailsFinal->id;
		$OrderHistory->product_id =$order->product_id;
		$OrderHistory->quantity= $order->quantity;
		$OrderHistory->attribute_desc= $order->attribute_desc;
		$OrderHistory->price_per_product= $order->price_per_product;
		$OrderHistory->price_product_qty= $order->price_product_qty;
		$OrderHistory->quantity= $order->quantity; 
		$OrderHistory->status= $order->status;
		$OrderHistory->order_id= $OrderDetails->order_id;;
		$OrderHistory->save();
	}

	$delete_cart = OrderAttributes::where(['user_id'=>$user_id])->delete();
	$delete_order_details = OrderDetails::where(['user_id'=>$user_id])->delete();

	$request->session()->forget('user_id');
	$request->session()->forget('order_id');

	return view('/pages/front-end/cashondelivery',compact('OrderDetails'));

}

public function checkGuest($email_id = ""){
//if user email exists return user id
	if (User::where('email', $email_id)->exists()) {   
		$user_id = User::where('email', $email_id)->first('id');
		return $user_id->id;
	}else{
	// if user does not exist, create new user and return new user id

		$GuestUser = new User;
		$GuestUser->name = "Guest";
		$GuestUser->email= $email_id;
		$GuestUser->save();	

		Auth::loginUsingId($GuestUser->id,true);
		return $GuestUser->id;
	}
} 

 
public function setGuestUserid($user_id = ""){

	$update_guest_id = OrderAttributes::where('user_id',Session::get('user_id'))->first();
	$update_guest_id->user_id = $user_id;
	$update_guest_id->save();

}


public function makeOrderDetails($model = "", $attribute=""){   

	$id = intval($attribute);  //dd($id);

	if($model == "binding"){
		$attribute = Product::find($id)->first();
		return "is ".$attribute->title_english;
	}

	if($model == "page-format"){
		$attribute = PageFormat::find($id)->first();
		return "type is ".$attribute->page_format;
	}

	if($model == "cover-color"){
		$attribute = CoverColor::find($id)->first();
		return "is ".$attribute->color;
	}

	if($model == "cover-sheet"){
		$attribute = CoverSheet::find($id)->first();
		return "is ".$attribute->sheet;
	}

	if($model == "back-cover"){
		$attribute = BackCovers::find($id)->first();
		return "is ".$attribute->back_cover;
	}

	if($model == "page_options"){
		$attribute = PageOptions::find($id)->first();
		return "is ".$attribute->page_options;
	}
 
	if($model == "paper-weight"){
		$attribute = PaperWeight::find($id)->first();
		return "is ".$attribute->paper_weight;
	}

	if($model == "mirror"){
		$attribute = Mirror::find($id)->first();
		return "type is ".$attribute->mirror;
	}

	if($model == "fonts"){
		return "is ".$attribute;
	}

	if($model == "date-format"){
		return "is ".$attribute;
	}

	if($model == "cd-bag"){
		$attribute = CdBag::find($id)->first();
		return "is ".$attribute->bag;
	}

	if($model == "data_check"){
		$attribute = DataCheck::find($id)->first();
		return "is ".$attribute->check_list;
	}

	return "are ".$attribute;

}
  

public static function CartCount(){

	if(Auth::check()) 
	{
	$user_id = Auth::user()->id; 
	$cart = count(OrderAttributes::where(['status'=>'1','user_id'=>$user_id])->get());
	return $cart;
	}else{
		return 0;
	}
} 


public function paperWeightSheets(Request $request){

	$range = ProductPaperWeight::where(['product_id'=>$request->input('binding'),'paper_weight_id'=>$request->input('weight')])->get(['min_sheets','max_sheets']);

	return json_encode($range);



} 
		
}
  