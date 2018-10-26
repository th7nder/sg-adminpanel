<?php
	function genRandomString($howlong) {
		$chars = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890"; 
		$len = strlen($chars) - 1; 
		$output = '';
		for($i = 0; $i < $howlong; $i++) { 
			$random = rand(0, $len); 
			$output .=  $chars[$random]; 
		} 
		return $output; 
	}
	function redirect($url = "") {
		header("Location: " . $url);
	}
	function returnJson($bool, $data = false) {
		return json_encode(array('status' => $bool, 'data' => $data));
	}
	
	function filterGet($var){
		return str_replace("/", "", $var);
	}