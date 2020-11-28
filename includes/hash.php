<?php
function encrypt($string, $key){
	$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC), MCRYPT_DEV_URANDOM);
	$encrypted = base64_encode($iv . mcrypt_encrypt(MCRYPT_RIJNDAEL_256, hash('sha256', $key, true), $string, MCRYPT_MODE_CBC, $iv));
	return $encrypted;
}

function decrypt($string, $key){
	if( $string != '' ){
		$data = base64_decode($string);
		$iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
		$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, hash('sha256', $key, true), substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)), MCRYPT_MODE_CBC, $iv), "\0");
	}else{
		$decrypted = '';
	}
	return $decrypted;
}

?>