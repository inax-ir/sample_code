<?php
//اطلاعات وب سرویس آینکس
$username = 'USER';
$password = 'PASS';

$db_host 		= 'localhost';
$db_username 	= 'root';
$db_password 	= '';
$db_name 		= 'root';

//پوشه محل نصب بدون اسلش آخر
$dir = 'sample_script';

$test_mode = true;

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

$host_url 	= $Protocol . $_SERVER['HTTP_HOST'] ;

$base_url = "$host_url/$dir";

$API_URL 	= "https://inax.ir/webservice.php";
?>
