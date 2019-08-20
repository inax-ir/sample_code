<?php
include(dirname( __FILE__ ).'/config.php');
include(dirname( __FILE__ ).'/jdf.php');
include(dirname( __FILE__ ).'/smarty-3.1.30/libs/SmartyBC.class.php');
include(dirname( __FILE__ ).'/function.php');
include(dirname( __FILE__ ).'/validation.php');

$smarty = new SmartyBC;
$smarty->setCompileDir('../templates_c');
$smarty->assign('base_url', $base_url);

$validate = new SimaNet_Validate;

$today_date = jdate("l d F Y");
$smarty->assign('today_date',$today_date);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

ini_set("display_errors", 1);
error_reporting(E_ALL); 
$smarty->debugging = false;
?>