<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
