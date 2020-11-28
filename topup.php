<?php
include(dirname( __FILE__ ).'/includes/load.php');

$smarty->assign('charge_active',true);

$smarty->assign('buy_charge',true);
$smarty->assign('title', 'خرید شارژ مستقیم');

if(isset($_GET['action']) && $_GET['action']=='list'){
	$smarty->assign('topup_result',true);
	$smarty->assign('title', 'نتیجه خرید شارژ');

	if(isset($_GET['inax_token']) && $_GET['inax_token']!=''){//نتیجه تراکنش
		$inax_token 	= $_GET['inax_token'];
		$decrypted 		= inax_url_decrypt( $inax_token );
		if(!$decrypted['status']){
			$error_msg = 'خطا در تجزیه اطلاعات دریافتی';
		}else{
			parse_str($decrypted['data'], $ir_output);
			$trans_id 	= $ir_output['id'];
			$order_id 	= $ir_output['order_id'];
			$amount 	= $ir_output['amount'];
			$ref_code	= $ir_output['ref_code'];
			$status 	= $ir_output['status'];

			$smarty->append('pay_result',$ir_output);
		}
	}
}

if(isset($_GET['MTN'])){
	$operator = 'MTN';
	$smarty->assign('mtn_active',true);
}
elseif(isset($_GET['MCI'])){
	$operator = 'MCI';
	$smarty->assign('mci_active',true);
}
elseif(isset($_GET['RTL'])){
	$operator = 'RTL';
	$smarty->assign('rtl_active',true);
}

if( isset($_POST['btnSubmit']) && ( isset($_GET['MTN']) || isset($_GET['MCI']) || isset($_GET['RTL']) ) ){
	if(isset($_POST['mobile']) && $_POST['mobile']!='' ){ $mobile = filter($_POST['mobile'],'number'); } else {	$mobile ='';}
	if(isset($_POST['amount']) && $_POST['amount']!='' ){ $amount = filter($_POST['amount']); } else {	$amount ='';}
	$charge_type = (isset($_POST['charge_type']) && $_POST['charge_type']!='' ) ? filter($_POST['charge_type']) : '';// provider defined in config.php

	if($amount=='custom_amount'){
		$amount = filter($_POST['custom_amount']);
		$amount = str_replace(',','',$amount);
		$custom_amount=true;
		$smarty->assign('custom_amount',true);
	}
	$valid_amount = array(500,1000,2000,5000,10000,20000,30000,40000,50000);
	if($mobile == ""){
		$error_msg = 'شماره موبایل را وارد کنید !';
	}
	if($amount == ""){
		$error_msg = 'مبلغ خالی است !';
	}
	elseif(!$validate->Mobile($mobile)){
		$error_msg = 'شماره موبایل صحیح نیست !';
	}
	elseif(!$validate->Number($amount)){
		$error_msg = 'مبلغ ارسالی صحیح نیست !';
	}
	elseif( !isset($custom_amount) && !in_array($amount, $valid_amount)) {
		$error_msg = 'مبلغ شارژ صحیح نیست !';
	}
	elseif( isset($custom_amount) && ($amount<500 ||  $amount>200000) ){//custom amount
		$error_msg = 'مبلغ شارژ باید مابین 500 الی 200,000 تومان باشد';
	}
	elseif( $charge_type == ""){
		$error_msg = 'لطفا نوع شارژ را انتخاب کنید';
	}
	elseif( $charge_type!= "normal" && $charge_type!= "amazing" && $charge_type!= "mnp" && $charge_type!= "permanent" ){
		$error_msg = 'نوع شارژ صحیح نیست';
	}
	else{
		$order_id = time();
		$trans_id= 123;
		$callback = "{$base_url}/topup.php?action=list";
		
		$param = array(
			'product'		=> 'topup',
			'amount'		=> $amount,
			'mobile'		=> $mobile,
			'operator'		=> $operator,
			'charge_type'	=> $charge_type,
			'order_id'		=> $order_id,
			'callback'		=> $callback,
			'test_mode'		=> $test_mode,
		);
		$result = RequestJson('invoice',$param);
		
		if(isset($result)){
			if($result['code']==1){
				$trans_id = $result['trans_id'];
				header( "Location: https://inax.ir/pay.php?tid={$trans_id}" );
			}else{
				$error_msg= $result['msg'];
			}
		}else{
			$error_msg = "لطفا کمی بعد دوباره تلاش نمائید";
		}
	}
}
if(isset($error_msg)){$smarty->assign('error_msg',$error_msg);}
if(isset($success_msg)){$smarty->assign('success_msg',$success_msg);}
$smarty->display('topup.tpl');

?>