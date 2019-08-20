<?php
$username = '';
$password = '';

if(isset($_SERVER['HTTP_HOST'])){
	$HTTP_HOST = $_SERVER['HTTP_HOST'];
}else{
	$HTTP_HOST = '';
}
if(!empty($_SERVER['HTTPS']) && ($_SERVER['HTTPS']=='on') ) {
	$Protocol = 'https://';
}else{
	$Protocol = 'http://';
}

//$domain_root		= dirname();

$base_url 	= $Protocol.$HTTP_HOST."/script";
$API_URL 	= "https://inax.ir/webservice.php";
?>
