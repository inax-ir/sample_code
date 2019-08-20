<?php
function RequestJson($method,$param) {
	global $API_URL,$username,$password;	
	
	if (!is_string($method)) {
		error_log("Method name must be a string\n");
		return false;
	}

	if (!$param) {
		$param = array();
	}else if (!is_array($param)) {
		error_log("Parameters must be an array\n");
		return false;
	}
	
	$parameters = array(
		'username'		=> $username,
		'password'		=> $password,
		'method'		=> $method
	);	
	
	if(isset($param) && !empty($param)){
		foreach( $param as $key => $value)
			$parameters[$key] = $value;		
	}

	$handle = curl_init($API_URL);
	curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 20);
	curl_setopt($handle, CURLOPT_TIMEOUT, 60);
	curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($parameters));
	curl_setopt($handle, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));

	return exec_curl_request($handle);
}

function exec_curl_request($handle) {
	$response = curl_exec($handle);		
	//print_r($response);	
	//file_put_contents('logd',ob_get_clean());	
	if ($response === false) {
		$errno = curl_errno($handle);
		$error = curl_error($handle);
		error_log("Curl returned error $errno: $error\n");
		curl_close($handle);
		return false;
	}
	
	$http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));
	curl_close($handle);	
	
	if ($http_code >= 500) {
		// do not wat to DDOS server if something goes wrong
		sleep(10);
		return false;
	}
	elseif ($http_code != 200) {
		$response = json_decode($response, true);
		error_log("Request has failed with error {$response['error_code']}: {$response['msg']}\n");
		if ($http_code == 401) {
			throw new Exception('Invalid access token provided');
		}
		return false;	
	}
	else{
		$response = json_decode($response, true);
		if (isset($response['msg'])  ) {
			error_log("Request was successfull: {$response['msg']}\n");
		}		
		//$response = $response['code'];
	}	
	return $response;
}
function filter($value='',$type=''){
	global $mysqli;
	$value = strip_tags($value); // Strip HTML and PHP tags from a string
	$value = htmlspecialchars($value);
	$value = addslashes($value);
	$value = str_replace('<','',$value);
	$value = str_replace('>','',$value);
	
	if($type == 'number'){
		$value = trim($value);
	}
	if($type == 'get_int'){
		$value = intval($value);
	}
	
	//$value = $mysqli->real_escape_string($value);
	return $value;
}
?>