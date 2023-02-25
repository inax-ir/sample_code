<?php
include(dirname( __FILE__ ).'/config.php');
include(dirname( __FILE__ ).'/jdf.php');
include(dirname( __FILE__ ).'/smarty-4.3.0/libs/Smarty.class.php');
include(dirname( __FILE__ ).'/function.php');
include(dirname( __FILE__ ).'/validation.php');

$smarty = new Smarty;
$smarty->setCompileDir(realpath(__DIR__ . '/../') . '/templates_c');

if(isset($base_url)){
	$smarty->assign('base_url', $base_url);
}

$validate = new SimaNet_Validate;

$today_date = jdate("l d F Y");
$smarty->assign('today_date',$today_date);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//https://www.smarty.net/docs/en/api.register.plugin.tpl
$smarty->registerPlugin("modifier","operator_fa", "operator_fa");
$smarty->registerPlugin("modifier","bill_type", "bill_type");
$smarty->registerPlugin("modifier","jdate_format", "jdate_format");

ini_set("display_errors", 1);
error_reporting(E_ALL); 
$smarty->debugging = false;
?>