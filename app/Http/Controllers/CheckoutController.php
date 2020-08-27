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
use App\ProductPrice;
use App\PrintoutBasicPrice;
use App\PrintoutPaperSurcharge;
use App\DataCheckPrice;
use App\CdCoverPrice;
use App\ProductPrintFinishing;
use App\ProductCoverSetting;
use App\CustomerArea;
use App\UserAddress;
use App\ProductCoverColor;
use App\ProductCoverSheet; 
use App\ProductBackSheet;
use App\ProductPrintFinishingArtList;
use App\User;
use App\EmbossingCover;
use App\EmbossingSpine; 
use App\SplitOrderShippingAddress;
use \Exception;
use Auth;
use Session; 
use App\Rules\CheckCodeRule;


use Mail;



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


	public function loosePrint(){

		$cd_bag = CdBag::where('status', '1')->get();
		$data_check = DataCheck::where('status', '1')->get();
		$product_listing = Product::where('status', '1')->get(); 
		$page_options = PageOptions::where('status', '1')->get(); 
		$fonts = Font::where('status', '1')->get(); 
		$date_format = DateFormat::where('status', '1')->get(); 

		return view('/pages/front-end/loose-print',compact('product_listing','page_options','fonts','date_format','data_check','cd_bag'));

	}

	public function getProductAttributes(Request $request){

		$page_format = ""; $cover_color = ""; $cover_sheet = ""; $back_cover = "";

		$product_attribute_relation = Product::find($request->id)->psProductAttribute()->get(['model','attribute','ps_product_attributes.id']);   
		//$details = json_decode(json_encode($product_attribute_relation),true);

		foreach ($product_attribute_relation as $key => $attribute) {
			
			$product_attribute = $attribute['model']; 

			if($product_attribute == "PageFormat"){     

				$page_format = self::getPageFormat($request->id);  //print_r($page_format); 

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
		} catch (\Exception $e) {
			print_r($e->getMessage());
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
		}catch (\Exception $e) {
			print_r($e->getMessage());
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

		}catch (\Exception $e){
			print_r($e->getMessage());
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

		}catch (\Exception $e){
			print_r($e->getMessage());
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
		} catch (\Exception $e) {
			print_r($e->getMessage());
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
		} catch (\Exception $e) {
			print_r($e->getMessage());
			return [];
		}
	}


	public function clearSession(Request $request){


		try{

		if($request->session()->has('embossing_type')){
			$request->session()->forget('embossing_type');
		}

		if($request->session()->has('cd_imprint')){
			$request->session()->forget('cd_imprint');
		}
		
		if($request->session()->has('no_of_copies')){
			$request->session()->forget('no_of_copies');
		}

		if($request->session()->has('binding_type')){
			$request->session()->forget('binding_type');
		}  
		if($request->session()->has('no_of_sheets')){
			$request->session()->forget('no_of_sheets');
		}
		if($request->session()->has('pageOptions')){
			$request->session()->forget('pageOptions');
		}
		if($request->session()->has('embossingCover')){
			$request->session()->forget('embossingCover');
		}
		if($request->session()->has('embossingSpine')){
			$request->session()->forget('embossingSpine');
		}
		if($request->session()->has('cdCover')){
			$request->session()->forget('cdCover');
		}
		if($request->session()->has('A2_page')){ 
			$request->session()->forget('A2_page');
		}
		if($request->session()->has('A3_page')){
			$request->session()->forget('A3_page');
		}
		if($request->session()->has('nosOfCds')){
			$request->session()->forget('nosOfCds');
		}
		if($request->session()->has('dataCheck')){
			$request->session()->forget('dataCheck');
		}
		if($request->session()->has('coloredSheets')){
			$request->session()->forget('coloredSheets'); 
		}
		if($request->session()->has('deliveryService')){
			$request->session()->forget('deliveryService');
		}
		
		$response = returnResponse([""],'200','Success');
		print_r($response);

	}catch(\Exception $e){
		print_r($e->getMessage());
	}

	}


	public function clearSessionParticular(Request $request){

		if($request->session == "embossingCover"){

			if($request->session()->has('embossingCover')){
			$request->session()->forget('embossingCover');
			print_r("done");

		}
		}			

		if($request->session == "embossingSpine"){

			if($request->session()->has('embossingSpine')){
			$request->session()->forget('embossingSpine');
			print_r("done");

		}

	 }	

	 if($request->session == "cd_imprint"){

			if($request->session()->has('cd_imprint')){
			$request->session()->forget('cd_imprint');
			print_r("done");

		}

	}

}	


	public function getPrice(Request $request){ 

		$binding_price = 0.00; $embosing_spine = 0.00; $embosing_cover = 0.00; $printout = 0.00; $printout_basic = 0.00; 
		$printout_surcharge = 0.00; $cd_dvd = 0.00; $delivery_cost = 0.00; $colored_price_A2 = 0.00; $b_w_price_A2 = 0.00; 
		$colored_price_A3 = 0.00; $b_w_price_A3 = 0.00; $colored_price_A4 = 0.00; $b_w_price_A4 = 0.00; $Price_surcharge_A2 = 0.00; 
		$Price_surcharge_A3 = 0.00; $Price_surcharge_A4 = 0.00; $data_check_price =0.00; $no_of_copies=0.00; 
		$price_embossing_cover = 0.00;  $price_embossing_spine = 0.00; $cd_dvd_print_price = 0.00;  $cd_dvd_cover_price = 0.00; 
		$cd_dvd_price = 0.00;  $embossment_price = 0.00; $total = 0.00; $total_unit_price = 0.00; $cd_dvd_unit_price = 0.00; 
		$cd_dvd_print_unit_price = 0.00; $cd_dvd_unit_price = 0.00; $cd_dvd_cover_unit_price = 0.00;

		// save values in session

		if($request->input('binding_type') != ""){
			$request->session()->forget('binding_type');
			$request->session()->put('binding_type', $request->input('binding_type'));
			$request->session()->save();
		}

		
		if($request->input('cd_imprint') != ""){
			$request->session()->forget('cd_imprint');
			$request->session()->put('cd_imprint', $request->input('cd_imprint'));
			$request->session()->save();
		}


		if($request->input('no_of_copies') != ""){ 

			$request->session()->forget('no_of_copies');
			$request->session()->put('no_of_copies', $request->input('no_of_copies'));
			$request->session()->save();
		}

		if($request->input('no_of_sheets') != ""){
			$request->session()->forget('no_of_sheets');
			$request->session()->put('no_of_sheets', $request->input('no_of_sheets'));
			$request->session()->save();
		} 

		if($request->input('pageOptions') != ""){  
			$request->session()->forget('pageOptions');
			$request->session()->put('pageOptions', $request->input('pageOptions')); 
			$request->session()->save();  
		}

		if($request->input('embossingCover') != ""){  //print_r('cover');
			$request->session()->forget('embossingCover');
			$request->session()->put('embossingCover', $request->input('embossingCover'));
			$request->session()->save();
		}

		if($request->input('embossingSpine') != ""){  //print_r('spine');
			$request->session()->forget('embossingSpine');   
			$request->session()->put('embossingSpine', $request->input('embossingSpine'));
			$request->session()->save();
		}

		if($request->input('paperWeight') != ""){   
			$request->session()->forget('paperWeight');
			$request->session()->put('paperWeight', $request->input('paperWeight'));
			$request->session()->save();
		}

		if($request->input('cdCover') != ""){
			$request->session()->forget('cdCover');
			$request->session()->put('cdCover', $request->input('cdCover'));
			$request->session()->save();
		}

		if($request->input('A2_page') != ""){
			$request->session()->forget('A2_page');
			$request->session()->put('A2_page', $request->input('A2_page'));
			$request->session()->save();
		}

		if($request->input('A3_page') != ""){
			$request->session()->forget('A3_page');
			$request->session()->put('A3_page', $request->input('A3_page'));
			$request->session()->save();
		}

		if($request->input('nosOfCds') != ""){
			$request->session()->forget('nosOfCds');
			$request->session()->put('nosOfCds', $request->input('nosOfCds'));
			$request->session()->save();
		}  

		if($request->input('dataCheck') != ""){
			$request->session()->forget('dataCheck');
			$request->session()->put('dataCheck', $request->input('dataCheck'));
			$request->session()->save();
		}

		if($request->input('coloredSheets') != ""){
			$request->session()->forget('coloredSheets');
			$request->session()->put('coloredSheets', $request->input('coloredSheets'));
			$request->session()->save();
		}

		if($request->input('deliveryService') != ""){
			$request->session()->forget('deliveryService');
			$request->session()->put('deliveryService', $request->input('deliveryService'));
			$request->session()->save();
		}

		if($request->input('embossing_type') != ""){ 
			$request->session()->forget('embossing_type');
			$request->session()->put('embossing_type', $request->input('embossing_type'));
			$request->session()->flash('embossing_type', $request->input('embossing_type'));
			$request->session()->save();
		}  //print_r("E: ".$request->session()->get('embossing_type'));



		//print_r(session()->all());

		if ($request->session()->has('binding_type') && $request->session()->has('no_of_sheets') && $request->session()->has('pageOptions')) {  
			$sheets = 0;
			if($request->session()->get('pageOptions') == "1"){
				$sheets = intval($request->session()->get('no_of_sheets'));
			}else if($request->session()->get('pageOptions') == "2"){
				$sheets = intval($request->session()->get('no_of_sheets')) / 2;
			}
 
			try{
				$binding_price = number_format(ProductPrice::where('min_range','<=',$sheets)
				->where('max_range','>=',$sheets)
				->where('ps_product_id',$request->session()->get('binding_type'))
				->where('status','1')->first('price')->price,2);  
			}catch(\Exception $e){

				$binding_price = 0.00;
			}	    
		} 

		// printout basic price A2
		if($request->session()->has('pageOptions') && $request->session()->has('A2_page') ){  

			$colored = 0.00; $b_w = 0.00; 

			if($request->session()->get('pageOptions') == "1"){
				//$sheets = $request->session()->get('A2_page');
				$sided = "one-sided";
			}else if($request->session()->get('pageOptions') == "2"){
				//$sheets = intval($request->session()->get('A2_page')) / 2;
				$sided = "two-sided";
				}  //print_r("2---".$sheets);

				$sheets = $request->session()->get('A2_page');

				if($request->session()->has('coloredSheets')){
					$colored = intval($request->session()->get('coloredSheets'));
					$b_w = $sheets - $colored;
					try{
						$c_price = PrintoutBasicPrice::where('din','A2')
						->where('color','colored')
						->where('sided',$sided)->first('price')->price;
					}catch(\Exception $e){
						$c_price = 0.00;
					}

					try{
						$b_price = PrintoutBasicPrice::where('din','A2')
						->where('color','B/W')
						->where('sided',$sided)->first('price')->price;
					}catch(\Exception $e){
						$b_price = 0.00;
					}
					$colored_price_A2 = $colored * floatval($c_price);
					$b_w_price_A2 = $b_w * floatval($b_price);
				}else{
					$b_w = $sheets;
					try{
						$b_price = PrintoutBasicPrice::where('din','A2')
						->where('color','B/W')
						->where('sided',$sided)->first('price')->price;
					}catch(\Exception $e){
						$b_price = 0.00;
					}
					$b_w_price_A2 = $b_w * floatval($b_price);
				}
			}  

		// printout basic price A3
			if($request->session()->has('pageOptions') && $request->session()->has('A3_page') ){  

				$colored = 0.00; $b_w = 0.00; 

				if($request->session()->get('pageOptions') == "1"){
					//$sheets = $request->session()->get('A3_page');
					$sided = "one-sided";
				}else if($request->session()->get('pageOptions') == "2"){
					//$sheets = intval($request->session()->get('A3_page')) / 2;
					$sided = "two-sided";
				}

				$sheets = $request->session()->get('A3_page');

				if($request->session()->has('coloredSheets')){
					// if($request->session()->get('pageOptions') == "1"){
					//   $colored = intval($request->session()->get('coloredSheets'));
					// }else if($request->session()->get('pageOptions') == "2"){
					//   $colored = intval($request->session()->get('coloredSheets')) / 2;
					// }

					$colored = intval($request->session()->get('coloredSheets'));
					$b_w = $sheets - $colored;

					try{
						$c_price =PrintoutBasicPrice::where('din','A3')
						->where('color','colored')
						->where('sided',$sided)->first('price')->price;
					}catch(\Exception $e){
						$c_price = 0.00;
					}

					try{
						$b_price = PrintoutBasicPrice::where('din','A3')
						->where('color','B/W')
						->where('sided',$sided)->first('price')->price;
					}catch(\Exception $e){
						$b_price = 0.00;
					}
					$colored_price_A3 = floatval($colored) * floatval($c_price);
					$b_w_price_A3 = $b_w * floatval($b_price);
				}else{
					$b_w = $sheets;
					try{
						$b_price = PrintoutBasicPrice::where('din','A3')
						->where('color','B/W')
						->where('sided',$sided)->first('price')->price;
					}catch(\Exception $e){
						$b_price = 0.00;
					}
					$b_w_price_A3 = $b_w * floatval($b_price);   
				}
			}   

			

		// printout basic price A4
			if($request->session()->has('pageOptions') && $request->session()->has('no_of_sheets')){  

				$colored = 0.00; $b_w = 0.00; 

				if($request->session()->get('pageOptions') == "1"){
					//$sheets = $request->session()->get('no_of_sheets');
					$sided = "one-sided";
				}else if($request->session()->get('pageOptions') == "2"){
					//$sheets = intval($request->session()->get('no_of_sheets')) / 2;
					$sided = "two-sided";
				}

				$sheets = $request->session()->get('no_of_sheets');

				if($request->session()->has('coloredSheets')){

					// if($request->session()->get('pageOptions') == "1"){
					//   $colored = intval($request->session()->get('coloredSheets'));
					// }else if($request->session()->get('pageOptions') == "2"){
					//   $colored = intval($request->session()->get('coloredSheets')) / 2;
					// }

					$colored = intval($request->session()->get('coloredSheets'));

					$b_w = $sheets - $colored;
					try{
						$c_price = PrintoutBasicPrice::where('din','A4') 
						->where('color','colored')
						->where('sided',$sided)->first('price')->price;
					}catch(\Exception $e){
						$c_price = 0.00;
					}

					try{
						$b_price = PrintoutBasicPrice::where('din','A4')
						->where('color','B/W')
						->where('sided',$sided)->first('price')->price;
					}catch(\Exception $e){
						$b_price = 0.00;
					}
					$colored_price_A4 = $colored * floatval($c_price);
					$b_w_price_A4 = $b_w * floatval($b_price);
				}else{
					$b_w = $sheets;
					try{
						$b_price =PrintoutBasicPrice::where('din','A4')
						->where('color','B/W')
						->where('sided',$sided)->first('price')->price;
					}catch(\Exception $e){
						$b_price = 0.00;
					}
					$b_w_price_A4 = $b_w * floatval($b_price);

					
				}
			}  
			$printout_basic = $colored_price_A3 + $b_w_price_A3 + $colored_price_A2 + $b_w_price_A2 + $colored_price_A4 + $b_w_price_A4;


		// paper surcharge price A2
			if($request->session()->has('pageOptions') && $request->session()->has('A2_page') && $request->session()->has('paperWeight') ){  

				$paperWeight = PaperWeight::where('id',$request->session()->get('paperWeight'))->first('paper_weight',$request->session()->get('paperWeight'))->paper_weight;

				if($request->session()->get('pageOptions') == "1"){
					//$sheets = $request->session()->get('A2_page');
					$sided = "one-sided";
				}else if($request->session()->get('pageOptions') == "2"){
					//$sheets = intval($request->session()->get('A2_page')) / 2;
					$sided = "two-sided";
				}

				$sheets = $request->session()->get('A2_page');


				try{  
					$Surcharge_A2 = PrintoutPaperSurcharge::where('din','A2')
					->where('papier',$paperWeight)
					->where('sided',$sided)->first('price')->price;	 //print_r($Price_surcharge_A2);

					$Price_surcharge_A2 = $sheets * floatval($Surcharge_A2);
				}catch(\Exception $e){
					$Price_surcharge_A2 = 0.00;
				}


			}  

		// paper surcharge price A3
			if($request->session()->has('pageOptions') && $request->session()->has('A3_page') && $request->session()->has('paperWeight') ){  

				$paperWeight = PaperWeight::where('id',$request->session()->get('paperWeight'))->first('paper_weight',$request->session()->get('paperWeight'))->paper_weight;

				if($request->session()->get('pageOptions') == "1"){
					//$sheets = $request->session()->get('A3_page');
					$sided = "one-sided";
				}else if($request->session()->get('pageOptions') == "2"){
					//$sheets = intval($request->session()->get('A3_page')) / 2;
					$sided = "two-sided";
				}

				$sheets = $request->session()->get('A3_page');

				try{  
					$Surcharge_A3 = PrintoutPaperSurcharge::where('din','A3')
					->where('papier',$paperWeight)
					->where('sided',$sided)->first('price')->price;	

					$Price_surcharge_A3 =$sheets * floatval($Surcharge_A3);
				}catch(\Exception $e){
					$Price_surcharge_A3 = 0.00;
				}	
			}   

		// paper surcharge price A4
			if($request->session()->has('pageOptions') && $request->session()->has('paperWeight') && $request->session()->has('no_of_sheets')){  

				$paperWeight = PaperWeight::where('id',$request->session()->get('paperWeight'))->first('paper_weight',$request->session()->get('paperWeight'))->paper_weight;

				if($request->session()->get('pageOptions') == "1"){
					//$sheets = $request->session()->get('no_of_sheets');
					$sided = "one-sided"; 
				}else if($request->session()->get('pageOptions') == "2"){
					//$sheets = floatval($request->session()->get('no_of_sheets')) / 2;
					$sided = "two-sided";
				}

				$sheets = $request->session()->get('no_of_sheets');

				try{  
					$Surcharge_A4 = PrintoutPaperSurcharge::where('din','A4')
					->where('papier',$paperWeight)
					->where('sided',$sided)->first('price')->price;	

					$Price_surcharge_A4 = floatval($sheets * $Surcharge_A4);   	
				}catch(\Exception $e){
					$Price_surcharge_A4 = 0.00;
				}
			}   

			$printout_surcharge = $Price_surcharge_A2 + $Price_surcharge_A3 + $Price_surcharge_A4; 
			//print_r($printout_basic."++".$printout_surcharge);
			$printout = number_format(($printout_basic + $printout_surcharge),2);
			//$printout = ($printout_basic + $printout_surcharge);

		// price data check
			if($request->session()->has('dataCheck')){ 
				$data_check_value = DataCheck::where('id',$request->session()->get('dataCheck'))->first('check_list')->check_list;
				try {
					$data_check_price = number_format(DataCheckPrice::where('type',$data_check_value)->first('price')->price,2);
				} catch (\Exception $e) {
					$data_check_price = 0.00;
				}

			}
 
		// price cd/dvd   
			if($request->session()->has('nosOfCds') && $request->session()->has('cdCover')){ 
				$no_of_cds = $request->session()->get('nosOfCds');
				$cd = 2.00; $cd_dvd_val = 0.00; $cd_dvd_cover_price = 0.00; $cd_dvd_price = 0.00;
				try{
					$cd_dvd_val = CdCoverPrice::where('cd_bag_id',$request->session()->get('cdCover'))->first('price')->price;
					$cd_dvd_cover_price = $cd_dvd_val * $no_of_cds;
					$cd_dvd_price = $no_of_cds * $cd;

					$cd_dvd_cover_unit_price = $cd_dvd_val * intval(1) ;
					$cd_dvd_unit_price = intval(1) * $cd;

				}catch(\Exception $e){
					$cd_dvd_price = 0.00;
					$cd_dvd_cover_price = 0.00;

					$cd_dvd_unit_price = 0.00;
					$cd_dvd_cover_unit_price = 0.00;
				}  

				
			}  


			if($request->session()->has('nosOfCds') && $request->session()->has('cd_imprint')){ 
				if($request->session()->get('cd_imprint') == '0'){}else{
					$no_of_cds = $request->session()->get('nosOfCds');
					$cd_print = 2.00;
					try{
						$cd_dvd_print_price = $no_of_cds * $cd_print;

						$cd_dvd_print_unit_price = intval(1) * $cd_print;
					}catch(\Exception $e){
						$cd_dvd_print_price = 0.00;
						$cd_dvd_print_unit_price = 0.00;
					}
				}
				
			}

			$cd_dvd = number_format(($cd_dvd_cover_price + $cd_dvd_price + $cd_dvd_print_price) ,2);

			// calculate cd_dvd unit price 
			
			$cd_dvd_unit_price = number_format(($cd_dvd_cover_unit_price + $cd_dvd_unit_price + $cd_dvd_print_unit_price) ,2);

		// price embossing   
			//print_r("E: ".$request->session()->get('embossing_type'));
		
			if($request->session()->has('embossing_type') && $request->session()->has('embossingCover')){

				//if($request->session()->has('embossingCover')){

				//$embossing = 0.00;  
				//print_r("cover");

					try{ 

						$refinementType = ProductPrintFinishing::where(['product_id' => $request->session()->get('binding_type')])->first('print_finishing_id')->print_finishing_id;  

							$price_embossing_cover = EmbossingCover::where(['type' => $request->session()->get('embossing_type')])->first('price')->price;  // print_r("-----".$price_embossing_cover."-------");
						

					}catch (Exception $e) {

						$price_embossing_cover = 0.00;

					}   
 
			}	 
		 if($request->session()->has('embossing_type') && $request->session()->has('embossingSpine')){
				//print_r("spine");
				//if($request->session()->has('embossingCover')){

				//$embossing = 0.00;

				//print_r("hh222");

					try{ 

						$refinementType = ProductPrintFinishing::where(['product_id' => $request->session()->get('binding_type')])->first('print_finishing_id')->print_finishing_id;  

							$price_embossing_spine = EmbossingSpine::where(['type' => $request->session()->get('embossing_type')])->first('price')->price;   //print_r("-----".$price_embossing_spine."-------");
						 

					}catch (Exception $e) {

						$price_embossing_spine = 0.00;  
 
					}   
 
			}  


			// no of copies 
			  if($request->session()->has('no_of_copies')){

			  	$no_of_copies = $request->session()->get('no_of_copies');

			  }

			  //print_r("E1".$price_embossing_spine);    print_r("E2:".$price_embossing_cover);

			  $embossment_price = number_format(($price_embossing_spine  + $price_embossing_cover) ,2);

			 // print_r("--------".$embossment_price);
 

			  $total_unit_price = number_format(($binding_price + $printout + $embossment_price),2);

			 
			  if(($binding_price + $printout + $data_check_price) > 0){ 
			  	$total =number_format((($no_of_copies) * ($binding_price + $printout + $price_embossing_cover + $price_embossing_spine)) + $cd_dvd + $data_check_price , 2);
			  }else{
			  	$total = 0.00;
			  }

			$binding_price = number_format($binding_price,2); 

			$data = compact('binding_price','printout','data_check_price','embossment_price','cd_dvd','total','total_unit_price','cd_dvd_unit_price');
			$response = returnResponse($data,'200','Success');
			print_r($response); exit;
 
		}

public function saveOrder(Request $request){ 
 
//dd(str_replace(',', '', $request->input('total')));
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

	if(!is_null($value) && $value != "-1" && $key != "_token" && $key != "selectfile" && $str_arr[0] != "selectfile" && $key != "total" && $key != "embossment-template-name" && $key != "cd-template-name"){

		$attribute_value = self::makeOrderDetails($key,$value);
	// make scentence for product details
		// $product_details .= $key ." ".$attribute_value." ,";
		$product_details .= $attribute_value." ,";
	}

} 

$qty = 1;

if (Auth::check())
	{
		$user_id = Auth::user()->id;
		Session::put('user_id', $user_id);
//print_r($user_id);
	}else{
		$user_id = time();
		Session::put('user_id', $user_id);
	} 
//dd($request->input('total'));
	$total = str_replace(',', '', $request->input('total'));

$total = filter_var(floatval($total), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
//dd(floatval($total));

//dd(floatval($request->total) * ($request->no_of_copies));  
	$OrderAttributes = new OrderAttributes;
	$OrderAttributes->user_id = $user_id;
	$OrderAttributes->product= $product;
	$OrderAttributes->attribute = $product_attribute;
//$OrderAttributes->product_id= $product."_".$user_id."_".time();
	$OrderAttributes->product_id = $request->input('binding');
	$OrderAttributes->quantity= $qty; 
	$OrderAttributes->attribute_desc= $product_details;
	$OrderAttributes->price_per_product=floatval($total);
	//$OrderAttributes->price_product_qty= floatval($request->total) * $qty;
	$OrderAttributes->price_product_qty = floatval($total) * ($request->no_of_copies);
	$OrderAttributes->cd_dvd_unit_price=floatval($request->input('cd_dvd_unit_price'));
	$OrderAttributes->quantity = 1; 
	$OrderAttributes->no_of_copies = $request->no_of_copies; 
	$OrderAttributes->no_of_cds = $request->number_of_cds;
	$OrderAttributes->status= 1;
	$OrderAttributes->save();

	//dd($OrderAttributes);


	session(['product_id' =>  $product."_".$user_id."_".time()]);

	return redirect()->route('cart');

} 

public function cart(){  
	$split_record_unique_id =[];

	

	if (Auth::check()) 
		{
			$user_id = Auth::user()->id;
		}else{
			$user_id = Session::get('user_id');
		} 

		try{
			$product_data = OrderAttributes::where(['status'=>'1','user_id'=>$user_id])->get();  
		}catch(Exception $e){
			$product_data = [];
		}
//dd($product_data);

		try{
			$billing_address_data = UserAddress::where(['address_type'=>'billing','user_id'=>$user_id, 'default'=>'1'])->limit('1')->get();

			if($billing_address_data->isEmpty()){

				$billing_address_data = []; 

			}

		}catch(Exception $e){ 
			$billing_address_data = [];    
		} 


		try{
			$shipping_address_data = UserAddress::where(['address_type'=>'shipping','user_id'=>$user_id])->get();
 

		}catch(Exception $e){

			$shipping_address_data = [];

			
		}	

		try{
			$shipping_company = DeliveryService::where(['status' => 1])->get();
		}catch(Exception $e){
			$shipping_company =[];
		} 


		try{
			$split_order = SplitOrderShippingAddress::where(['user_id' => $user_id, 'status' => 0])->get();

			// dd($split_order);
			foreach($split_order as $key => $value){

				$split_record_unique_id[$value->unique_id][$key] = ['id' => $value->id, 'prod_sequence' => $value->prod_sequence, 'sequence' => $value->sequence, 'unique_id' => $value->unique_id, 'no_of_copies' => $value->no_of_copies, 'no_of_cds' => $value->no_of_cds, 'shipping_address' => $value->shipping_address, 'shipping_company' => $value->shipping_company];

			}

		}catch(Exception $e){
			$split_order =[];
			$split_record_unique_id =[];
		} 	//dd($split_record_unique_id);

		return view('/pages/front-end/cart',compact('product_data','shipping_company','billing_address_data','shipping_address_data','split_order','split_record_unique_id'));

	}


public function calculateDeliveryCost($delivery = "", $copies = "", $cds = "", $discountFlag = ""){

	$product_shipping = []; $quantity = 0; $delivery_cost = 0; $total_delivery_cost = 0;

	$counter = 0;

	foreach($delivery as $key_shipping_company => $value_shipping_company){

		$product = explode ("_", $key_shipping_company)[0];  
		$sequence = explode ("_", $key_shipping_company)[1];
		$shipping_company = $value_shipping_company;
		$quantity = $copies[$key_shipping_company] + $cds[$key_shipping_company];


		try{

				$delivery_cost_details = LettesOfSpine::where('delivery_service_id' ,'=', $shipping_company)
			                               ->where('ds_from','<=',$quantity)
			                               ->where('ds_to','>=',$quantity)
			                               ->where('ds_del_status','=','0')->first();   

			    $delivery_cost = $delivery_cost_details->ds_price;
			    $shipping_company = $delivery_cost_details->delivery_service_id;
			    

			}catch(Exception $e){

				$delivery_cost = 0;

		}

		
		$total_delivery_cost += $delivery_cost;

		// if($discountFlag == 1 ){  $counter = $counter + 1;
		// 	if($counter == 1){ 
		// 		$product_shipping[$product][$sequence] = ['product' => $product, 'shipping_cost' => 0];
		// 		$discountFlag = 0; 
		// 	} 
		// }else{
		// 	$product_shipping[$product][$sequence] = ['product' => $product, 'shipping_cost' => $delivery_cost];
		// }


		// This will skipp adding of delivery cost of first order's first shipping cost (This is case of Discount Code Type 0 )

		$product_shipping[$product][$sequence] = ['product' => $product, 'shipping_cost' => $delivery_cost, 'shipping_company'=>$shipping_company];
		
	} 

	return $product_shipping;

}


public function calculateDiscountAmount($code = "", $total = "", $delivery = "", $copies = "", $cds = "", $products){

	$net_amt_after_delivery_service  = 0; $net_amt = 0; $delivery_cost_per_product = []; $prod_ids = [];
	$total_delivery_service = 0; $delivery_cost = []; $discount_type = -1; $discount_amt = 0.0; $prod_flag = 0;


	$discount = Discount::where(['code' => $code])->first(['by_price','by_percent','type','product_id']);
	
	// delivery discount
	if($discount->type == 0){
				
		$discount_type = 0;

		$delivery_cost_per_product = self::calculateDeliveryCost($delivery, $copies, $cds, 1);


		$delivery_cost = $delivery_cost_per_product;  //dd($delivery_cost_per_product);

		$counter = 0;
	
		foreach($delivery_cost_per_product as $prod_key => $prod_value){

			foreach($prod_value as $prod_detail_key => $prod_detail_value){  //dd($prod_detail_value['shipping_company']);

				if($discount_type == 0){ //dd($prod_detail_value['shipping_company']);
					$counter = $counter + 1; 
					 if ($counter == 1 && $prod_detail_value['shipping_company'] != 15)  
					 	$discount_amt = $prod_detail_value['shipping_cost']; 
					}

				$total_delivery_service+= $prod_detail_value['shipping_cost'];

			}	
		}  

		$net_amt = $total - $discount_amt;

		$net_amt_after_delivery_service = $net_amt + $total_delivery_service;


	// single / multiple product discount
	}elseif($discount->type == 2){

		$discount_type = 2;
		$product_ids = json_decode($discount->product_id,true); 

		// product ids with discount code
		foreach($product_ids as $dis_key => $dis_value){

			// product ids in cart
			foreach($products as $prod_key => $prod_value){

				if($dis_value == $prod_value->product_id){

					$prod_flag = 1;

				}

			} 

		} 

		if($prod_flag == 1){

				if($discount->by_price != "null" && ! empty($discount->by_price)){
					$discount_amt = number_format($discount->by_price,2);
				}else{
					$discount_amt =number_format( ($total / 100 ) * $discount->by_percent,2);
				}

			// discount is more then total i.e no code will be applied

				if($discount_amt > $total){ 
					$net_amt = $total - 0.00;
					$discount_amt = 0;
				}else{
					$net_amt = $total - $discount_amt; 
				}
		}


		$delivery_cost_per_product = self::calculateDeliveryCost($delivery, $copies, $cds, 1);


		$delivery_cost = $delivery_cost_per_product;  

		$counter = 0;
	
		foreach($delivery_cost_per_product as $prod_key => $prod_value){

			foreach($prod_value as $prod_detail_key => $prod_detail_value){  

				$total_delivery_service+= $prod_detail_value['shipping_cost'];

			}	
		}  

		$net_amt_after_delivery_service = $net_amt + $total_delivery_service;
	
	}


	return ['delivery_cost' => $delivery_cost, 'total_delivery_service' => $total_delivery_service, 'net_amt_after_delivery_service' => $net_amt_after_delivery_service, 'net_amt' => $net_amt, 'discount_amt'=>$discount_amt];

}


public function orderDetails(Request $request){  

	//dd($request->input());


$total = 0;  $net_amt_after_delivery_service  = 0; $net_amt = 0; $delivery_cost_per_product = []; $total_delivery_service = 0; $delivery_cost = []; $discount_type = -1; $discount_amt = 0;

//$total_cart = self::CartCount();  

if (Auth::check()) 
	{
		$user_id = Auth::user()->id;
	}else{
		$user_id = Session::get('user_id');
	}
//dd($user_id);
	$product_data = OrderAttributes::where('user_id', $user_id)->get();
	// foreach($product_data as $value){

	// 	$total += $value->price_product_qty; 

	// } //dd("aa".$total); 

if (Auth::check() && Auth::user()->name != "Guest") 
{
	

  // if user is logged in no need to enter email
	$validator = Validator::make($request->all(), [ 
		'no_of_copies.*'=> 'required|not_in:0',
		'no_of_cds.*' => 'nullable',
		'shipping_company.*' => 'required|not_in:-1',
		'shipping_address.*' => 'required|not_in:-1',             
		'billing_address' => 'required',
		'email_id' => 'nullable|email',
		'code' => ['nullable','exists:ps_discount',new CheckCodeRule('code')],        
	], [
		'no_of_copies.*.required' => 'No of Copies are required',
		'shipping_company.*.not_in' => 'Shipping Company is required',
		'shipping_address.*.not_in' => 'Shipping Address is required', 
		//'billing_address.*.not_in' => 'Billing Address is required',
	]); 

}else if((Auth::check() && Auth::user()->name == "Guest") || ! Auth::check()){ // user not logged in have to enter email
	
	$validator = Validator::make($request->all(), [   
		'no_of_copies.*'=> 'required|not_in:0',
		'no_of_cds.*' => 'nullable',
		'shipping_company.*' => 'required|not_in:-1',
		'shipping_address.*' => 'required|not_in:-1',             
		'billing_address' => 'required',
		'email_id' => 'required|email', 
		'code' => ['nullable','exists:ps_discount',new CheckCodeRule('code')],
	], [
		'no_of_copies.*.required' => 'No of Copies are required',
		'shipping_company.*.not_in' => 'Shipping Company is required',
		'shipping_address.*.not_in' => 'Shipping Address is required',
		//'billing_address.*.not_in' => 'Billing Address is required',
	]); 

}
  

	if ($validator->passes()){ 

				// Check if Guest already exists (using email id)
				// get already existing or new user_id
					if($user_id == Session::get('user_id')){ 
						$user_id = self::checkGuest($request->input('email_id'));
					// set new user id for Guest in tables
						self::setGuestUserid($user_id);
					}

					foreach($product_data as $key=>$product_detail){

						$update_data = $product_detail;
						$update_data->item_sequence = $key+1;
						// $update_data->no_of_copies = $request->no_of_copies[$key];
						// $update_data->no_of_cds = $request->no_of_cds[$key];
						// $update_data->no_of_copies = $request->total_copies_after_split.$key;
						// $update_data->no_of_cds = $request->total_cds_after_split.$key;
						// $update_data->shipping_company = deliveryServiceById($request->shipping_company[$key]);
						// $update_data->shipping_address = $request->shipping_address[$key];
						$update_data->billing_address = $request->billing_address; 
						$update_data->save();   

					}

					$product_data_merge_cart = OrderAttributes::where('user_id', $user_id)->get();
						foreach($product_data_merge_cart  as $value){

							$total += $value->price_product_qty; 

						}  //dd($user_id); dd($total);

					//handling promo code
					if($request->input('code') != "null" && ! empty($request->input('code'))){


						$discount_details = self::calculateDiscountAmount($request->input('code'), $total, $request->input('shipping_company'),$request->input('no_of_copies'),$request->input('no_of_cds'), $product_data);  

						$delivery_cost = $discount_details['delivery_cost'];
						$total_delivery_service = $discount_details['total_delivery_service'];
						$net_amt_after_delivery_service = $discount_details['net_amt_after_delivery_service'];
						$net_amt = $discount_details['net_amt'];
						$discount_amt = $discount_details['discount_amt'];

					}else{ 

							$discount_amt = 0.0;
							$net_amt = $total - $discount_amt;


							// handling delivery service costing in case when user has not applied any of the discount code

							$delivery_cost_per_product = self::calculateDeliveryCost($request->input('shipping_company'),$request->input('no_of_copies'),$request->input('no_of_cds'), 0);

							$delivery_cost = $delivery_cost_per_product;
						
							foreach($delivery_cost_per_product as $prod_key => $prod_value){

								foreach($prod_value as $prod_detail_key => $prod_detail_value){

									$total_delivery_service+= $prod_detail_value['shipping_cost'];

								}

								
							}


							$net_amt_after_delivery_service = $net_amt + $total_delivery_service;


					}
					

			   $order_id = $user_id.'_'.time();

				Session::put('order_id', $order_id);


				$OrderDetailsvalue = new OrderDetails;
				$OrderDetailsvalue->user_id = $user_id;
				$OrderDetailsvalue->order_id= Session::get('order_id');
				$OrderDetailsvalue->promo_code= $request->input('code'); 
				$OrderDetailsvalue->email_id= $request->input('email_id');
				$OrderDetailsvalue->total= $total;
				$OrderDetailsvalue->billing_address= $request->input('billing_address');
				$OrderDetailsvalue->net_amt= $net_amt_after_delivery_service;  
				$OrderDetailsvalue->save();


				//update unique id in split order addresses table with order id, so that it could be fetched in admin panel.

				$split_order_record = SplitOrderShippingAddress::where(['user_id' => $user_id , 'status' => 0])->get();

				foreach ($split_order_record as $key => $value) {

					$UpdateSplitOrder = $value;
					$UpdateSplitOrder->unique_id = Session::get('order_id');
					$UpdateSplitOrder->status = 1;
					$UpdateSplitOrder->save();

				}


			//dd($total);

				$product_data = OrderAttributes::where('user_id', $user_id)->get();

				return view('/pages/front-end/order',compact('product_data','discount_amt','total','net_amt','delivery_cost','net_amt_after_delivery_service','discount_type'));


}else{//dd("faiil"); 

dd($validator->errors());

			try{
					$billing_address_data = UserAddress::where(['address_type'=>'billing','user_id'=>$user_id, 'default'=>'1'])->limit('1')->get();

					if($billing_address_data->isEmpty()){

						$billing_address_data = []; 

					}

				}catch(Exception $e){
					$billing_address_data = [];    
				} 


				try{
					$shipping_address_data = UserAddress::where(['address_type'=>'shipping','user_id'=>$user_id])->get();
		 

				}catch(Exception $e){

					$shipping_address_data = [];

					
				}	

				try{
					$shipping_company = DeliveryService::where(['status' => 1])->get();
				}catch(Exception $e){
					$shipping_company =[];
				} 



				try{
					$split_order = SplitOrderShippingAddress::where(['user_id' => session::get('user_id'), 'status' => 0])->get();

					foreach($split_order as $key => $value){

						$split_record_unique_id[$value->unique_id][$key] = ['id' => $value->id, 'prod_sequence' => $value->prod_sequence, 'sequence' => $value->sequence, 'unique_id' => $value->unique_id, 'no_of_copies' => $value->no_of_copies, 'no_of_cds' => $value->no_of_cds, 'shipping_address' => $value->shipping_address, 'shipping_company' => $value->shipping_company];

					}

				}catch(Exception $e){
					$split_order =[];
					$split_record_unique_id=[];
				} 


				$errors = $validator->errors();  

				return view('/pages/front-end/cart',compact('product_data','shipping_company','billing_address_data','shipping_address_data','errors','split_order','split_record_unique_id'));
		//return back()->with('errors', $validator->errors());
   }
 

}   


public function clearSplitOrderTable(Request $request){

	if (Auth::check())
	{
		$user_id = Auth::user()->id;
	}else{
		$user_id = 0;
	}

	$record = SplitOrderShippingAddress::where(['user_id' => $user_id, 'status' => 0])->delete();
	print_r($record);

}


public function getDiscountcodeStatus(Request $request){ 

	if($request->code == ''){
		return "";
	}

		if (Auth::check()){
           $user_id = Auth::user()->id;
        }else{
            $user_id = Session::get('user_id');
        }

	 // Multi Product discount - Check if discound code is valid for particular product or not

       $discount = Discount::where(['code' => $request->code])->first(['by_price','by_percent','type','product_id']);
       $prod_flag = 0;

       if($discount->type == 2){

              $product_ids = json_decode($discount->product_id,true); 

              $products = OrderAttributes::where('user_id', $user_id)->get();

              // product ids with discount code
              foreach($product_ids as $dis_key => $dis_value){

                // product ids in cart
                foreach($products as $prod_key => $prod_value){

                  if($dis_value == $prod_value->product_id){

                    $prod_flag = 1;

                  }

                } 

              } 

              if($prod_flag == 0){
                return "false";
              }else{
                return "true";
              }
            
      }

       // check if user has already used a code

    if(OrderDetailsFinal::where(['user_id' => $user_id, 'promo_code' => $request->code])->first() != null){

        return "false";
        
    }

    // Check discount code exist or not

	if(Discount::where(['code' => $request->code])->first() == null){

		return "false";
	}


	 // check validity of code wrt date

	if(Discount::where(['code' => $request->code])->where('to_date' ,'<' ,date('Y-m-d'))->first() == null && Discount::where(['code' => $request->code])->where('from_date' ,'>' ,date('Y-m-d'))->first() == null){
   
        return "true";

    }

    if(Discount::where(['code' => $request->code])->whereNull('to_date')->first() != null && Discount::where(['code' => $request->code])->where('from_date' ,'>' ,date('Y-m-d'))->first() == null){

         return "true";

       }else{

        return "false";

       }
 
}


public function getAttributes(Request $request){

	$attributes = [];

	if (Auth::check())
	{
		$user_id = Auth::user()->id;
	}else{
		$user_id = session::get('user_id');
	}


	try{
		
	$data = OrderAttributes::where('user_id', $user_id)->take($request->input('count'))->get('attribute');
      
    $i = 0;

    foreach($data as $key_data => $data_value){

		$attributes = json_decode($data_value->attribute,true);
		$count = count(json_decode($data_value->attribute,true));

		$details = [];

		foreach($attributes as $key=>$value){

			$details[$key] = $value;
			$attributes_details[$i] = $details;	
			
		}     $i++; 
       
    }

    print_r(json_encode($attributes_details));

}catch(\Exception $e){

	print_r($e->getMessage());
	$attributes_details = [];

}


}


public function setQuantity(Request $request){

	$qty = $request->input('qty');
	$no_of_copies = $request->input('no_of_copies');
	$no_of_cds = $request->input('no_of_cds');
	$total_new = $request->input('total');
	$sequence = $request->input('sequence');
	$product_details = "";

	if (Auth::check())
	{
		$user_id = Auth::user()->id;
	}else{
		$user_id = session::get('user_id');
	}
		
	$data = OrderAttributes::where('user_id', $user_id)->take($request->input('count'))->get()->toArray();


	$record_id = $data[$sequence]['id'];


	$attributes = json_decode($data[$sequence]['attribute'],true);

    foreach($attributes as $key => $value){

    	if($key == "no_of_copies"){

    		$attributes[$key] = $no_of_copies;

    	}

    	if($key == "number_of_cds"){

    		$attributes[$key] = $no_of_cds;

    	}

    	if($key == "total"){

    		$attributes[$key] = $total_new;

    	}

    	$str_arr = explode ("_", $key);  

    	if(!is_null($value) && $value != "-1" && $key != "_token" && $key != "selectfile" && $str_arr[0] != "selectfile" && $key != "total" && $key != "embossment-template-name" && $key != "cd-template-name"){

    		if($key == "no_of_copies"){

    		$attribute_value = self::makeOrderDetails($key, $no_of_copies);

    		}elseif($key == "number_of_cds"){

	    		$attribute_value = self::makeOrderDetails($key,$no_of_cds);

	    	}elseif($key == "total"){

	    		$attribute_value = self::makeOrderDetails($key,$total_new);

	    	}else{
	    		$attribute_value = self::makeOrderDetails($key,$value);
	    	}

			// make scentence for product details
			$product_details .= $attribute_value." ,";
		}

    }    


    $total_new = filter_var($total_new, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
		
		$data = OrderAttributes::where('id', $record_id)->first();

			$update_data = $data;
			$update_data->quantity = $qty;
			$update_data->price_product_qty = floatval($total_new);
			$update_data->no_of_copies = $no_of_copies;
			$update_data->no_of_cds = $no_of_cds;
			$update_data->attribute = json_encode($attributes); 
			$update_data->attribute_desc = $product_details;
			$update_data->save();

		// exit;


		print_r($product_details);

	}

    

    public function insertSplitOrder(Request $request){

   // print_r($request->input('no_of_copies'));


    	if (Auth::check())
		{
			$user_id = Auth::user()->id;
	
		}else{
			$user_id = Session::get('user_id');	
		}


    	$record = SplitOrderShippingAddress::where(['user_id'=>$user_id, 'unique_id' => $request->input('rowId') , 'sequence' => $request->input('sequence'), 'status' => 0 , 'prod_sequence' => $request->input('prod_sequence')])->first();

    	//print_r(json_encode($record)); 

    	if(json_encode($record) == "null"){

    		$new_record = new SplitOrderShippingAddress;
    		$new_record->prod_sequence = $request->input('prod_sequence');
    		$new_record->no_of_copies = $request->input('no_of_copies');
    		$new_record->no_of_cds = $request->input('no_of_cds');
    		$new_record->shipping_address = $request->input('shipping_address');
    		$new_record->shipping_company = $request->input('shipping_company');
    		$new_record->unique_id = $request->input('rowId');
    		$new_record->sequence = $request->input('sequence');
    		$new_record->user_id = $user_id;
    		$new_record->status = 0;
    		$new_record->save();
    		print_r('new_record');
    		print_r($new_record);


    	}else{

    		$update_record = $record;

    		if($request->input('no_of_copies') != ""){
    			$update_record->no_of_copies = $request->input('no_of_copies');
    		}

    		if($request->input('no_of_cds') != ""){
    			$update_record->no_of_cds = $request->input('no_of_cds');
    		}

    		if($request->input('shipping_address') != ""){
    			$update_record->shipping_address = $request->input('shipping_address');
    		}

    		if($request->input('shipping_company') != ""){
    			$update_record->shipping_company = $request->input('shipping_company');
    		}

    		if($request->input('sequence') != ""){
    			$update_record->sequence = $request->input('sequence');
    		}

    		if($request->input('prod_sequence') != ""){
    			$update_record->prod_sequence = $request->input('prod_sequence');
    		}
    		
    		$update_record->unique_id = $request->input('rowId');
    		$update_record->user_id = $user_id;
    		$update_record->status = 0;
    		$update_record->save();

    		print_r('old_record');
    		print_r($update_record);

    	}

    }


    public function removeSplitOrder(Request $request){

    print_r($request->input());

    	$record = SplitOrderShippingAddress::where(['unique_id' => $request->input('rowId') , 'sequence' => $request->input('sequence') ])->delete();


    }



	public function removeItem(Request $request){

		if (Auth::check())
			{
				$user_id = Auth::user()->id;
	
			}else{$user_id = 0;}

			$delete = OrderAttributes::destroy($request->id);
			$delete_split_order = SplitOrderShippingAddress::where(['unique_id' => $request->id] , ['user_id' => $user_id ])->delete();
	
			return redirect()->route('cart');

		}


public function paymentPaypal(){

	if(Auth::check())
		{
			$user_id = Auth::user()->id;
		}else{return redirect()->route('index'); }

		$product_data = OrderAttributes::where('user_id', $user_id)->get();
		$order_details = OrderDetails::where(['user_id'=> $user_id , 'order_id' => Session::get('order_id')])->first();
		// $net_amt = $order_details->total; 
		$net_amt = $order_details->net_amt; 
// // handling promo code
// 		if($order_details->promo_code != "null" && ! empty($order_details->promo_code)){  

// 			$discount = Discount::where(['code' => $order_details->promo_code])->first(['by_price','by_percent']);
// 	//dd($discount->by_price);
// 			if($discount->by_price != "null" && ! empty($discount->by_price)){
// 				$discount_amt = $discount->by_price;
// 			}else{
// 				$discount_amt = ($order_details->total / 100 ) * $discount->by_percent;
// 			}
// 			$net_amt = $order_details->total - $discount_amt;
// }  //dd($net_amt);

Session::forget('order_id');


return view('/pages/front-end/payment_paypal',compact('product_data','order_details','net_amt'));


} 


public function paymentPaypalSuccess(Request $request){

	if(Auth::check())
  {
    $user_id = Auth::user()->id;
  }else{
    return redirect()->route('index'); 
  }
  	try{
		$order_details = OrderDetails::where('user_id', $user_id)->first();

		// $order_details_amt = $order_details->total;
		$order_details_amt = $order_details->net_amt;
	}catch (Exception $e) {
		return redirect()->route('index');
	}
		$txn = $_GET['tx'];
//dd(floatval($_GET['amt']));

    $payment = new Payment;
    $payment->order_id = $order_details->order_id;
    $payment->txn = $_GET['tx'];
    $payment->status = $_GET['st'];
    $payment->user_id = $user_id;
    $payment->amount = floatval($_GET['amt']); 
    $payment->type = "paypal";
   // $payment->payment_type = "paypal"; 

    $payment->save();

		$OrderDetails = OrderDetails::where('user_id', $user_id)->first();
		$OrderDetailsFinal = new OrderDetailsFinal;
		$OrderDetailsFinal->user_id = $user_id;
		$OrderDetailsFinal->order_id= $OrderDetails->order_id;
		//$OrderDetailsFinal->no_of_copies= $OrderDetails->no_of_copies;
		//$OrderDetailsFinal->no_of_cds= $OrderDetails->no_of_cds;
		//$OrderDetailsFinal->shipping_company= $OrderDetails->shipping_company;
		$OrderDetailsFinal->promo_code= $OrderDetails->promo_code;
		//$OrderDetailsFinal->shipping_address= $OrderDetails->shipping_address;
		$OrderDetailsFinal->billing_address= $OrderDetails->billing_address;
		$OrderDetailsFinal->total= floatval($OrderDetails->total);
		$OrderDetailsFinal->net_amt= $OrderDetails->net_amt;
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
			$OrderHistory->item_sequence = $order->item_sequence;
			$OrderHistory->product= $order->product;
			$OrderHistory->no_of_copies = $order->no_of_copies;
			$OrderHistory->no_of_cds = $order->no_of_cds;
			$OrderHistory->shipping_company = $order->shipping_company;
			$OrderHistory->shipping_address = $order->shipping_address;
			$OrderHistory->billing_address = $order->billing_address;
			$OrderHistory->attribute = $order->attribute;
			$OrderHistory->order_history_id= $OrderDetailsFinal->id;
			$OrderHistory->product_id =$order->product_id;
			$OrderHistory->quantity= $order->quantity;
			$OrderHistory->attribute_desc= $order->attribute_desc;
			$OrderHistory->price_per_product= $order->price_per_product;
			$OrderHistory->price_product_qty= $order->price_product_qty;
			$OrderHistory->cd_dvd_unit_price= $order->cd_dvd_unit_price;
			$OrderHistory->quantity= $order->quantity; 
			$OrderHistory->status= $order->status;
			$OrderHistory->order_id= $OrderDetails->order_id;
			$OrderHistory->save();
		}
 

		//send mail for order place
		if ($OrderDetails->order_id) {

			$order_history = OrderHistory::where(['order_id' => $OrderDetails->order_id])->get()->toArray();

			$data = User::where(['id' => $user_id])->first();

			if (!empty($data) && !empty($order_history)) {

				$user_data = [

					'name' => @$data->name,
					'email' => @$data->email,
					'order_id' => $OrderDetails->order_id,
					'base_url' => \URL::to('/'),
					'logo_url' => \URL::to('/'). '/public/images/logo.png',
					'order_history' => $order_history,
					'total' => $OrderDetails->total,
				];


				try {

					$sent = Mail::send('emails.place_order_paypal', $user_data, function($message) use ($user_data) {

						$message->to($user_data['email'], $user_data['name'])->subject('Druckshop - Order Success');
						$message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
					});

				} catch (Exception $e) {

					print_r($e->getMessage());

                //Avoid error 

				}


			}

		} 
		// End send mail


		$delete_cart = OrderAttributes::where(['user_id'=>$user_id])->delete();
		$delete_order_details = OrderDetails::where(['user_id'=>$user_id])->delete();

		$request->session()->forget('user_id');
		$request->session()->forget('order_id');

		return view('/pages/front-end/paypalsuccess',compact('order_details','order_details_amt','txn'));

	}


	public function cashOnDelivery(Request $request){  

	// try{
	
			if(Auth::check()) 
				{
					$user_id = Auth::user()->id; 
				}else{
				return redirect()->route('index');
				}
			try{
				
				$OrderDetails = OrderDetails::where(['user_id'=> $user_id , 'order_id' => Session::get('order_id')])->first();
				// $net_amt = $OrderDetails->total; 
				$net_amt = $OrderDetails->net_amt; 
				$order_details_amt = $OrderDetails->net_amt;

			}catch (Exception $e) {
				print_r($e->getMessage());
				return redirect()->route('index');
			}
		// // handling promo code
		// 		if($OrderDetails->promo_code != "null" && ! empty($OrderDetails->promo_code)){  

		// 			$discount = Discount::where(['code' => $OrderDetails->promo_code])->first(['by_price','by_percent']);
		// 		//dd($discount->by_price);
		// 			if($discount->by_price != "null" && ! empty($discount->by_price)){
		// 				$discount_amt = $discount->by_price;
		// 			}else{
		// 				$discount_amt = ($OrderDetails->total / 100 ) * $discount->by_percent;
		// 			}
		// 			$net_amt = $OrderDetails->total - $discount_amt;
		// }  //dd($net_amt);


		// $order_details_amt = $OrderDetails->total;
		$txn = time();

		$payment = new Payment;
		$payment->order_id = $OrderDetails->order_id;
		$payment->txn = $txn;
		$payment->status = "Pending";
		$payment->user_id = $user_id;
		$payment->amount = $net_amt;  
		$payment->type = "COD";
		//$payment->payment_type = "COD";
		$payment->save();


		$OrderDetails = OrderDetails::where(['user_id'=> $user_id , 'order_id' => Session::get('order_id')])->first();

		$OrderDetailsFinal = new OrderDetailsFinal;
		$OrderDetailsFinal->user_id = $user_id;
		$OrderDetailsFinal->order_id= $OrderDetails->order_id;
			//$OrderDetailsFinal->no_of_copies= $OrderDetails->no_of_copies;
			//$OrderDetailsFinal->no_of_cds= $OrderDetails->no_of_cds;
			//$OrderDetailsFinal->shipping_company= $OrderDetails->shipping_company;
		$OrderDetailsFinal->promo_code= $OrderDetails->promo_code;
			//$OrderDetailsFinal->shipping_address= $OrderDetails->shipping_address;
		$OrderDetailsFinal->billing_address= $OrderDetails->billing_address;
		$OrderDetailsFinal->total= $OrderDetails->total;
		$OrderDetailsFinal->net_amt= $OrderDetails->net_amt;
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
			$OrderHistory->item_sequence = $order->item_sequence;
			$OrderHistory->product= $order->product;
			$OrderHistory->no_of_copies = $order->no_of_copies;
			$OrderHistory->no_of_cds = $order->no_of_cds;
			$OrderHistory->shipping_company = $order->shipping_company;
			$OrderHistory->shipping_address = $order->shipping_address;
			$OrderHistory->billing_address = $order->billing_address;
			$OrderHistory->attribute = $order->attribute;
			$OrderHistory->order_history_id= $OrderDetailsFinal->id;
			$OrderHistory->product_id =$order->product_id;
			$OrderHistory->quantity= $order->quantity;
			$OrderHistory->attribute_desc= $order->attribute_desc;
			$OrderHistory->price_per_product= $order->price_per_product;
			$OrderHistory->price_product_qty= $order->price_product_qty;
			$OrderHistory->cd_dvd_unit_price= $order->cd_dvd_unit_price;
			$OrderHistory->quantity= $order->quantity; 
			$OrderHistory->status= $order->status; 
			$OrderHistory->order_id= $OrderDetails->order_id;;
			$OrderHistory->save();
		}

		//send mail for order place
		if ($OrderDetails->order_id) {

			$order_history = OrderHistory::where(['order_id' => $OrderDetails->order_id])->get()->toArray();

			$data = User::where(['id' => $user_id])->first();

			if (!empty($data) && !empty($order_history)) {

				$user_data = [

					'name' => @$data->name,
					'email' => @$data->email,
					'order_id' => $OrderDetails->order_id,
					'base_url' => \URL::to('/'),
					'logo_url' => \URL::to('/'). '/public/images/logo.png',
					'order_history' => $order_history,
					'total' => $OrderDetails->total,
				];


				try {

					$sent = Mail::send('emails.place_order_cod', $user_data, function($message) use ($user_data) {

						$message->to($user_data['email'], $user_data['name'])->subject('Druckshop - Order Success');
						$message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
					});

				} catch (Exception $e) {

					//Avoid error 
					print_r($e->getMessage());

				}


			} 

		}
			// End send mail



		$delete_cart = OrderAttributes::where(['user_id'=>$user_id])->delete();
		$delete_order_details = OrderDetails::where(['user_id'=>$user_id])->delete();

		$request->session()->forget('user_id');
		$request->session()->forget('order_id');  //dd("cash");
		Session::forget('user_id');
		Session::forget('order_id');


	// }catch (Exception $e) {
	// 	return redirect()->route('/');
	// }
	return view('/pages/front-end/cashondelivery',compact('OrderDetails'));

}

public function checkGuest($email_id = ""){  
//if user email exists return user id
	// if (User::where('email', $email_id)->exists()) {  

	// 	$user_id = User::where('email', $email_id)->first('id');
		
	// 	Auth::loginUsingId($user_id->id,true);

	// 	if(Auth::check()){
	// 		//dd("in");
	// 	}else{
	// 		//dd("out");
	// 	
	//}// 	return $user_id->id;

	// }else{
	// // if user does not exist, create new user and return new user id

	// 	$GuestUser = new User;
	// 	$GuestUser->name = "Guest";
	// 	$GuestUser->email= $email_id;
	// 	$GuestUser->save();	

	// 	Auth::loginUsingId($GuestUser->id,true);

	// 	return $GuestUser->id;
	// }

	//if user does not exist, create new user and return new user id

	if($email_id != null){

		$GuestUser = new User;
		$GuestUser->name = "Guest";
		$GuestUser->email= $email_id;
		$GuestUser->save();	

		Auth::loginUsingId($GuestUser->id,true);

		return $GuestUser->id;

	}else{
		return Session::get('user_id');
	}

		
} 
 
public function setGuestUserid($user_id = ""){  //dd(Session::get('user_id'));

	$update_guest_id = OrderAttributes::where(['user_id'=>Session::get('user_id')])->get();
	foreach($update_guest_id as $data){

		$data->user_id = $user_id;
		$data->save();

	}
	


	$update_guest_id_address = UserAddress::where(['user_id'=>Session::get('user_id')])->get();

	foreach ($update_guest_id_address as $data) {
		
		$data->user_id = $user_id;
		$data->save();

	}

	$update_split_order = SplitOrderShippingAddress::where(['user_id' => Session::get('user_id')])->get();

		foreach ($update_split_order as $split_order_key => $split_order_value) {
			
			$new_user_id = $split_order_value;
			$new_user_id->user_id = $user_id;
			$new_user_id->save();

		}
	



}


public function makeOrderDetails($model = "", $attribute=""){   

	$id = intval($attribute);  //dd($id);

	if($model == "binding"){
		$attribute = Product::where(['id' => $id])->first();  
		return "Binding is ".$attribute->title_english;
	}

	if($model == "page-format"){
		$attribute = PageFormat::where(['id' => $id])->first();
		return "Page Format is ".$attribute->page_format;
	}

	if($model == "cover-color"){
		$attribute = CoverColor::where(['id' => $id])->first();
		return "Cover Color is ".$attribute->color;
	}

	if($model == "cover-sheet"){
		$attribute = CoverSheet::where(['id' => $id])->first();
		return "Cover Sheet is ".$attribute->sheet;
	}

	if($model == "back-cover"){
		$attribute = BackCovers::where(['id' => $id])->first();
		return "Back Cover is ".$attribute->back_cover;
	}

	if($model == "page_options"){
		$attribute = PageOptions::where(['id' => $id])->first();
		return "Page Option is ".$attribute->page_options;
	}

	if($model == "paper-weight"){
		$attribute = PaperWeight::where(['id' => $id])->first();
		return "Paper Weight is ".$attribute->paper_weight . " g/m²";
	}

	if($model == "mirror"){
		$attribute = Mirror::where(['id' => $id])->first();
		return "Mirror type is ".$attribute->mirror;
	}

	if($model == "fonts"){
		return "Font is ".$attribute;
	}

	if($model == "date-format"){
		return "Date Format is ".$attribute;
	}

	if($model == "cd-bag"){
		$attribute = CdBag::where(['id' => $id])->first();
		return "Cd Bag is ".$attribute->bag;
	}

	if($model == "data_check"){
		$attribute = DataCheck::where(['id' => $id])->first();
		return "Data Check is ".$attribute->check_list;
	}

	if($model == "no_of_copies"){
		return "No.of Copies are ".$attribute;
	}

	if($model == "no_of_pages"){
		return "No.of Pages are ".$attribute;
	}

	if($model == "pg_no"){
		return "No of Pages in uploaded thesis are ".$attribute;
	}

	if($model == "color-pages"){
		return "Color-Page is ".$attribute;
	}

	if($model == "page_numbers"){
		return "No of colored pages are ".$attribute;
	}

	if($model == "A3-pages"){
		return "A3-page is ".$attribute;
	}

	if($model == "number_of_pages"){
		return "No of A3 Pages are ".$attribute;
	}

	if($model == "pos_of_A3_pages"){
		return "Pos of A3 pages are ".$attribute;
	}

	if($model == "A2-pages"){
		return "A2-page is ".$attribute;
	}

	if($model == "number_of_A2_pages"){
		return "No of A2 pages are ".$attribute;
	}

	if($model == "embossing"){
		return "Embossing is ".$attribute;
	}

	if($model == "embossment-cover-sheet"){
		return "Embossment-cover-sheet is ".$attribute;
	}

	if($model == "template"){
		return "Binding template is ".$attribute;
	}

	if($model == "embossment-template-name"){
		return "Embossment template name is ".$attribute;
	}

	if($model == "embossment-spine"){
		return "Embossment-Spine is ".$attribute;
	}

	if($model == "spine-count-hidden"){
		return "Spine Count is ".$attribute;
	}

	if($model == "fonts-spine"){
		return "Font Spine is ".$attribute;
	}

	if($model == "direction"){
		return "Direction is ".$attribute;
	}

	if($model == "fields_1"){
		return "Field 1 is ".$attribute;
	}

	if($model == "pos_1"){
		return "Pos 1 is ".$attribute;
	}

	if($model == "input_1"){
		return "Input 1 is ".$attribute;
	}

	if($model == "fields_2"){
		return "Field 2 is ".$attribute;
	}

	if($model == "pos_2"){
		return "Pos 2 is ".$attribute;
	}

	if($model == "input_2"){
		return "Input 2 is ".$attribute;
	}

	if($model == "fields_3"){
		return "Field 3 is ".$attribute;
	}

	if($model == "pos_3"){
		return "Pos 3 is ".$attribute;
	}

	if($model == "input_3"){
		return "Input 3 is ".$attribute;
	}

	if($model == "remarks"){
		return "Remarks are ".$attribute;
	}

	if($model == "cd-check"){
		return "Cd-check is ".$attribute;
	}

	if($model == "number_of_cds"){
		return "No of cds are ".$attribute;
	}

	if($model == "imprint"){
		return "Imprint is ".$attribute;
	}

	if($model == "cd-template"){
		return "Cd Template is ".$attribute;
	}

	if($model == "cd-template-name"){
		return "Cd template name is ".$attribute;
	}

	if($model == "fonts-cd"){
		return "Fonts-cd is ".$attribute;
	}

	if($model == "pos-cd-bag"){
		return "Pos of cd-bag is ".$attribute;
	}

	if($model == "total"){
		return "Total is ".$attribute;
	}

	return "are ".$attribute;

}


public static function CartCount(){

	if(Auth::check()) 
		{
			$user_id = Auth::user()->id; 
			
		}else{
			$user_id = session::get('user_id'); 
		}

		$cart = count(OrderAttributes::where(['status'=>'1','user_id'=>$user_id])->get());
		return $cart;
	} 


	public function paperWeightSheets(Request $request){

		$range = ProductPaperWeight::where(['product_id'=>$request->input('binding'),'paper_weight_id'=>$request->input('weight')])->get(['min_sheets','max_sheets']);

		return json_encode($range);
	} 



	public function getPrintfinishingStatus(Request $request){


		try{

			$data = ProductPrintFinishing::where(['product_id' => $request->binding_type])->first('print_finishing_id');

			echo $data->print_finishing_id;

		}catch (Exception $e) {

			echo '0';

		}

	}


	public function getSpineCount(Request $request){


		try{

			//$data = ProductPaperWeight::where(['paper_weight_id' => $request->paper_weight, 'product_id' => $request->binding])->first('min_sheets');

			$data = PaperWeight::where(['id' => $request->paper_weight])->first('min_sheets_for_spine');

			echo $data->min_sheets_for_spine;

		}catch (Exception $e) {

			echo '0';

		}


	}	


	public function addAddress(Request $request){

		$CustomerArea_address = "";

		if (Auth::check()) 
			{
				$user_id = Auth::user()->id;
			}else{
				$user_id = Session::get('user_id');
			}

			$validator = Validator::make($request->all(), [ 
				'first_name' => 'required',
				'last_name' => 'required',
				'company_name' => 'nullable',
				'street' => 'required',
				'city' => 'required',                
				'zip_code' => 'required',
				'house_no' => 'required',  
				'addition' => 'nullable', 
				'state' => 'required',
				'address_type' => 'required',
			]); 

			$input = $request->all(); 

			if ($validator->passes()){    

				$input['user_id'] = $user_id;

				if($request->default == 0){

					$input['default'] = 0;

					$UserAddress= UserAddress::create($input);
					//print_r($UserAddress->toArray());

					$CustomerArea_address = $UserAddress->first_name." ".$UserAddress->last_name;

					if($UserAddress->company_name != ""){
						$CustomerArea_address .= ", ".$UserAddress->company_name.", ".$UserAddress->street." ".$UserAddress->house_no.", ".$UserAddress->zip_code." ".$UserAddress->city.", ".$UserAddress->state;
					}else{
						$CustomerArea_address .= ", ".$UserAddress->street." ".$UserAddress->house_no.", ".$UserAddress->zip_code." ".$UserAddress->city.", ".$UserAddress->state;
					}

					//$CustomerArea_address = $UserAddress->first_name." ".$UserAddress->last_name.", Company Name: ".$UserAddress->company_name.", House No: ".$UserAddress->house_no.", City: ".$UserAddress->city.", State: ".$UserAddress->state.", Zip Code: ".$UserAddress->zip_code;
					print_r($CustomerArea_address);

				}else{

					if($input['address_type'] == "billing"){

						try{

						$exist = UserAddress::where(['user_id' => $user_id, 'default' => 1, 'address_type' => 'shipping'])->first();
						
							$update_address = $exist;
							$update_address->address_type = "shipping";
							$update_address->first_name = $input['first_name'];
							$update_address->last_name = $input['last_name'];
							$update_address->company_name = $input['company_name'];
							$update_address->street = $input['street'];
							$update_address->city = $input['city'];
							$update_address->zip_code = $input['zip_code'];
							$update_address->house_no = $input['house_no'];
							$update_address->addition = $input['addition'];
							$update_address->state = $input['state'];
							$update_address->save();
						}catch(Exception $e){ 
							$input['default'] = 1;
							$input['address_type'] = "shipping";
							$UserAddress= UserAddress::create($input);
						}

						try{
							$exist = UserAddress::where(['user_id' => $user_id, 'default' => 1, 'address_type' => 'billing'])->first();
							
							$update_address = $exist;
							$update_address->address_type = "billing";
							$update_address->first_name = $input['first_name'];
							$update_address->last_name = $input['last_name'];
							$update_address->company_name = $input['company_name'];
							$update_address->street = $input['street'];
							$update_address->city = $input['city'];
							$update_address->zip_code = $input['zip_code'];
							$update_address->house_no = $input['house_no'];
							$update_address->addition = $input['addition'];
							$update_address->state = $input['state'];
							$update_address->save();


							$CustomerArea_address = $update_address->first_name." ".$update_address->last_name;

							if($update_address->company_name != ""){
								$CustomerArea_address .= ", ".$update_address->company_name.",  ".$update_address->street." ".$update_address->house_no.",  ".$update_address->zip_code." ".$update_address->city.", ".$update_address->state;
							}else{
								$CustomerArea_address .= ",  ".$update_address->street." ".$update_address->house_no.",  ".$update_address->zip_code." ".$update_address->city.", ".$update_address->state;
							}

							
							print_r($CustomerArea_address);

						}catch(Exception $e){  
							$input['default'] = 1;
							$input['address_type'] = "billing";
							$UserAddress= UserAddress::create($input);

							$CustomerArea_address = $UserAddress->first_name." ".$UserAddress->last_name;

							if($UserAddress->company_name != ""){
								$CustomerArea_address .= ", ".$UserAddress->company_name.",  ".$UserAddress->street." ".$UserAddress->house_no.",  ".$UserAddress->zip_code." ".$UserAddress->city.", ".$UserAddress->state;
							}else{
								$CustomerArea_address .= ",  ".$UserAddress->street." ".$UserAddress->house_no.",  ".$UserAddress->zip_code." ".$UserAddress->city.", ".$UserAddress->state;
							}

				
							print_r($CustomerArea_address);
						}

					}
	

					try{

						$area = CustomerArea::where(['user_id' => $user_id])->first();
						if($request->address_type == "billing"){

							$area->billing_address = $request->first_name." ".$request->last_name.", ".$request->company_name.",  ".$request->street." ".$request->house_no.",  ".$request->zip_code." ".$request->city.", ".$request->state;

							$CustomerArea_address = $UserAddress->first_name." ".$UserAddress->last_name;

							if($UserAddress->company_name != ""){
								$CustomerArea_address .= ", ".$request->company_name.",  ".$request->street." ".$request->house_no.",  ".$request->zip_code." ".$request->city.", ".$request->state;
							}else{
								$CustomerArea_address .= ",  ".$request->street." ".$request->house_no.",  ".$request->zip_code." ".$request->city.", ".$request->state;
							}

							
							print_r($CustomerArea_address);

						 }//else{

						// 	$area->shipping_address = $request->first_name." ".$request->last_name.", Company Name: ".$request->company_name.", House No: ".$request->house_no.", City: ".$request->city.", State: ".$request->state.", Zip Code: ".$request->zip_code;

						// }

						$area->save();

					}catch(\Exception $e){

						$area = new CustomerArea;
						$area->user_id = $user_id;
						$area->status = 1;

						if($request->address_type == "billing"){

							$area->billing_address = $request->first_name." ".$request->last_name.", ".$request->company_name.",  ".$request->street." ".$request->house_no.",  ".$request->zip_code." ".$request->city.", ".$request->state;

						 }
							//else{

						// 	$area->shipping_address = $request->first_name." ".$request->last_name.", Company Name: ".$request->company_name.", House No: ".$request->house_no.", City: ".$request->city.", State: ".$request->state.", Zip Code: ".$request->zip_code;

						// }

						$area->save(); 

					}

				} //print_r($CustomerArea_address);

			}else{

			}


			//print_r($CustomerArea_address);
 
		}



	public function getA3A2Count(Request $request){
 
		try{
			$A2_A3_data = PageFormat::where(['id' => $request->page_format, 'status' => '1'])->first();
		}catch(Exception $e){
			print_r($e->getMessage());
			$A2_A3_data = NULL; 
		}
		print_r(json_encode($A2_A3_data));

	}	


	public function getCoverSettings(Request $request){

		try{
			$cover_settings = ProductCoverSetting::where(['ps_product_id' => $request->binding, 'status' => '1'])->first('ps_cover_setting_id')->ps_cover_setting_id;
		}catch(Exception $e){
			print_r($e->getMessage());
			$cover_settings = NULL;
		}

		print_r($cover_settings);

	}


	public function getCoverColorData(Request $request){

		$color = [];

		try{
			$color_data = ProductCoverColor::where(['product_id' => $request->binding, 'status' => '1'])->get();
			foreach($color_data as $key=>$value){

			$color[$key] = ['id' => $value->color_id, 'color' => colorById($value->color_id)];
		}

		}catch(Exception $e){

			print_r($e->getMessage());
			$color = ['id' => '', 'color' => ''];
		}  

		

		print_r(json_encode($color));

	}


	public function getCoverSheetData(Request $request){

		$cover_sheet = [];

		try{

		$cover_sheet_data = ProductCoverSheet::where(['product_id' => $request->binding, 'status' => '1'])->get();  

		foreach($cover_sheet_data as $key=>$value){

			$cover_sheet[$key] = ['id' => $value->cover_sheet_id, 'cover' => sheetById($value->cover_sheet_id)];
		}

	}catch(Exception $e){

		print_r($e->getMessage());

		$cover_sheet= ['id' => '', 'cover' => ''];

	}
 
		print_r(json_encode($cover_sheet));

	}
 

	public function getBackCoverData(Request $request){
 
		$back_sheet = [];

		try{

		$back_sheet_data = ProductBackSheet::where(['product_id' => $request->binding,'status' => '1'])->get();  

		foreach($back_sheet_data as $key=>$value){

			$back_sheet[$key] = ['id' => $value->back_cover_id, 'cover' => backcoverById($value->back_cover_id)];
		}

	}catch(Exception $e){

		print_r($e->getMessage());
		$back_sheet = ['id' => '', 'cover' => ''];
	}

		print_r(json_encode($back_sheet));

	}


	public function getPageFormatData(Request $request){ 

		$page_format = [];

		try{
			$page_format_data = ProductPageFormat::where(['product_id' => $request->binding, 'status' => '1'])->get();  

		foreach($page_format_data as $key=>$value){

			$page_format[$key] = ['id' => $value->paper_format, 'cover' => pageformatById($value->paper_format)];
		}

	}catch(Exception $e){

		print_r($e->getMessage());
		$page_format = ['id' => '', 'cover' => ''];
	}

		print_r(json_encode($page_format));

	}

	public function getPaperWeightData(Request $request){

		$paper_weight = [];

		try{

			$paper_weight_data = ProductPaperWeight::where(['product_id' => $request->binding, 'status' => '1'])->get();  

			foreach($paper_weight_data as $key=>$value){

				$paper_weight[$key] = ['pid' => $value->paper_weight_id, 'weight' => weightById($value->paper_weight_id)];
			}

		}catch(Exception $e){

			print_r($e->getMessage());
			$paper_weight[$key] = ['pid' => '', 'weight' => ''];
		}

		

		print_r(json_encode($paper_weight));
	}



	public function getEmbossingFields(Request $request){

		$embossing_list = [];

		try{ 

		$refinementType = ProductPrintFinishing::where(['product_id' => $request->binding_type, 'status' => '1'])->first()->id;

		$embossing_list_data =  ProductPrintFinishingArtList::where(['ps_product_pf_id' => $refinementType])->get();

		foreach($embossing_list_data as $key=>$value){

			$embossing_list[$key] = ['eid' => $value->ps_art_list_id, 'embossment_type' => getEmbossingById($value->ps_art_list_id)];
		}

	}catch(Exception $e){

		print_r($e->getMessage());
		$embossing_list = ['eid' => '', 'embossment_type' => ''];
	}

		print_r(json_encode($embossing_list));

	}	


	public function getLettersSpine(Request $request){

		try{
			$letters = LettesOfSpine::where('paper_weight_id', '=', $request->paperWeight)
		                          ->where('sheets_range_start', '<=', $request->numberOfPages)
		                          ->where('sheets_range_end', '>=', $request->numberOfPages)
		                          ->where('status', '=', '1')->first()->letters;

		}catch(\Exception $e){

			//print_r($e->getMessage());
			$letters = 0;
		}


		print_r(json_encode($letters));


	}








}
