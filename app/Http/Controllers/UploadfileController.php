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

		$no_of_pages = self::count_pages(public_path().'/uploads/' . time() . '_' . $_FILES['file']['name']);
		$response_array = array('file_name'=>$_FILES['file']['name'], 'no_of_pages'=>$no_of_pages);
		$response = Response($response_array,'200','File uploaded successfully.');

		print_r($response);

	}


	public function count_pages($pdfname) {
		$pdftext = file_get_contents($pdfname);
		$num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
		return $num;
	}
}
