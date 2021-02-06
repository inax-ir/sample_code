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
	curl_setopt($handle, CURLOPT_ENCODING, "");
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
			//error_log("Request was successfull: {$response['msg']}\n");
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
function bill_type($bill_type){
	switch ($bill_type) {
		case 'water':	$new_bill_type="قبض آب"; break;
		case 'elec':	$new_bill_type="قبض برق"; break;
		case 'gas':		$new_bill_type="قبض گاز";break;
		case 'phone':	$new_bill_type="تلفن ثابت"; break;
		case 'mobile':	$new_bill_type="تلفن همراه"; break;
		case 'city':	$new_bill_type="عوارض شهرداری"; break;
		case 'tax':	$new_bill_type = 'سازمان مالیات';break;
		case 'traffic_fines':	$new_bill_type = 'جریمه راهنمایی و رانندگی';break;//Traffic ticket fines
		default : $new_bill_type=""; break;
	}
	return $new_bill_type;
}
function inax_url_decrypt($string){
	$counter = 0;
	$data = str_replace(array('-','_','.'),array('+','/','='),$string);
	$mod4 = strlen($data) % 4;
	if ($mod4) {
		$data .= substr('====', $mod4);
	}
	$decrypted = base64_decode($data);

	$check = array('id','order_id','amount','ref_code','status','buy_info');
	foreach($check as $str){
		if( strpos($decrypted, $str)!==false ){
			$counter++;
		}
	}

	if( $counter==5 || $counter==6){
		return array('data'=>$decrypted , 'status'=>true);
	}else{
		return array('data'=>'' , 'status'=>false);
	}
}
function jdate_format($string, $format=null){
    if ($format === null) {
        $format = 'Y/m/d ساعت H:i:s';
    }
	require_once(SMARTY_PLUGINS_DIR . 'shared.make_timestamp.php'); // برای تبدیل تایم استامپ لازم است
    $timestamp = smarty_make_timestamp($string);
	return jdate($format, $timestamp);
}
?>