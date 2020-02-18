<?php

if (! function_exists('returnResponse')) {
	function returnResponse($data = '', $code = '', $message = ''){

		return json_encode(array('data'=>$data,"status"=>$code,"message"=>$message));
	}
}