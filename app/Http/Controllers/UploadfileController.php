<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File; 
 
class UploadfileController extends Controller
{
	public function uploadFile(Request $request){

		 $arr_file_types = ['application/pdf'];

		

		 if (!file_exists(public_path().'/uploads')) {
		 	mkdir(public_path().'/uploads', 0777); 
		 } 

		 

		move_uploaded_file($_FILES['file']['tmp_name'], public_path().'/uploads/' . time() . '_' . preg_replace('/\s+/', '_', $_FILES['file']['name']));

		if ((in_array($_FILES['file']['type'], $arr_file_types))) {
			$no_of_pages = self::countPages(public_path().'/uploads/' . time() . '_' . preg_replace('/\s+/', '_', $_FILES['file']['name']));
		}else{
			$no_of_pages = 0;
		}

		
		$edit_file_name = time() . '_' . preg_replace('/\s+/', '_', $_FILES['file']['name']);
		$response_array = array('edit_name'=>$edit_file_name,'file_name'=>preg_replace('/\s+/', '_', $_FILES['file']['name']), 'no_of_pages'=>$no_of_pages);
	
		$response = returnResponse($response_array,'200','File uploaded successfully.');

		print_r($response);

	}


	public function countPages($pdfname) {
		$pdftext = file_get_contents($pdfname);
		$no_of_pages = preg_match_all("/\/Page\W/", $pdftext, $dummy); 
		return $no_of_pages;
	}

	public function removeFile(Request $request){

		$path = public_path()."/uploads/".preg_replace('/\s+/', '_', $request->file_name);

		if($path == public_path()."/uploads/"){
			
		}else{
			if (file_exists(public_path()."/uploads/".preg_replace('/\s+/', '_', $request->file_name))) {
        		unlink(public_path()."/uploads/".preg_replace('/\s+/', '_', $request->file_name));
    		}
		}

		
		//unlink(public_path()."/uploads/".$request->file_name);
		$response = returnResponse(array(),'200','File removed successfully.');
		print_r($response);


	}
}