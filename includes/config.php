<?php
$username = '';
$password = '';

$db_host 		= 'localhost';
$db_username 	= 'root';
$db_password 	= '';
$db_name 		= 'inax';

$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
if ($mysqli->connect_error) { echo "<h1>Error Establishing database connection ...</h1>"; exit;}
mysqli_set_charset($mysqli,"utf8");
date_default_timezone_set("Asia/Tehran");
$mysqli->query("SET time_zone='+3:30'; ");


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

$base_url 	= $Protocol.$HTTP_HOST."/inax";
$API_URL 	= "https://inax.ir/webservice.php";
?>
