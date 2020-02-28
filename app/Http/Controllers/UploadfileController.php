<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadfileController extends Controller
{
	public function uploadFile(Request $request){

		$arr_file_types = ['application/pdf'];

		if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
			echo "false";
			return;
		}
 
		// if (!file_exists('uploads')) {
		// 	mkdir('uploads', 0777); 
		// } 

		move_uploaded_file($_FILES['file']['tmp_name'], public_path().'/uploads/' . time() . '_' . $_FILES['file']['name']);

		$no_of_pages = self::countPages(public_path().'/uploads/' . time() . '_' . $_FILES['file']['name']);
		$edit_file_name = time() . '_' . $_FILES['file']['name'];
		$response_array = array('edit_name'=>$edit_file_name,'file_name'=>$_FILES['file']['name'], 'no_of_pages'=>$no_of_pages);
	
		$response = returnResponse($response_array,'200','File uploaded successfully.');

		print_r($response);

	}


	public function countPages($pdfname) {
		$pdftext = file_get_contents($pdfname);
		$no_of_pages = preg_match_all("/\/Page\W/", $pdftext, $dummy);
		return $no_of_pages;
	}

	public function removeFile(Request $request){

		unlink(public_path()."/uploads/".$request->file_name);
		$response = returnResponse(array(),'200','File removed successfully.');
		print_r($response);


	}
}
