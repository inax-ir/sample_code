<?php
include(dirname( __FILE__ ).'/includes/load.php');

$smarty->assign('index_active',true);
$smarty->assign('title','صفحه اصلی');

if(isset($_GET['contact-us'])){
	$smarty->assign('title','تماس با ما');
	$smarty->display('contact_us.tpl');
}
elseif(isset($_GET['about-us'])){
	$smarty->assign('title','درباره ما');
	$smarty->display('about_us.tpl');
}
elseif(isset($_GET['terms'])){
	$smarty->assign('title','قوانین سایت');
	$smarty->display('terms.tpl');
}elseif(isset($_GET['shekayat'])){
	$smarty->assign('title','ثبت شکایات');
	$smarty->display('shekayat.tpl');
}else{
	if(isset($error_msg)){$smarty->assign('error_msg',$error_msg);}
	if(isset($success_msg)){$smarty->assign('success_msg',$success_msg);}
	$smarty->display('index.tpl');
}

	


?>