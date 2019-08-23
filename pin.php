<?php
include(dirname( __FILE__ ).'/includes/load.php');

$smarty->assign('pin_active',true);

$smarty->assign('buy_charge',true);
$smarty->assign('title', 'خرید کارت شارژ');

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
elseif(isset($_GET['bill'])){
	$smarty->assign('bill_active',true);
}

if( isset($_POST['btnSubmit']) && ( isset($_GET['MTN']) || isset($_GET['MCI']) || isset($_GET['RTL']) ) ){
	
	if(isset($_POST['mobile']) && $_POST['mobile']!='' ){ $mobile = filter($_POST['mobile'],'number'); } else {	$mobile ='';		}
	if(isset($_POST['amount']) && $_POST['amount']!='' ){ $amount = filter($_POST['amount']); } else {	$amount ='';		}
	if(isset($_POST['count']) && $_POST['count']!='' ){ $count = filter($_POST['count']); } else {	$count =1;		}
	
	$valid_amount = array(1000,2000,5000,10000,20000,30000,40000,50000);
	
	if($mobile == ""){
		$error_msg = 'شماره موبایل را وارد کنید !';
	}
	elseif($amount == ""){
		$error_msg = 'مبلغ خالی است !';
	}
	elseif(!$validate->Mobile($mobile)){
		$error_msg = 'شماره موبایل صحیح نیست !';
	}
	elseif(!$validate->Number($amount)){
		$error_msg = 'مبلغ ارسالی صحیح نیست !';
	}
	elseif( $count <1 || $count > 200 ){
		$error_msg = 'تعداد باید مابین یک الی 200 باشد';
	}
	elseif( !in_array($amount, $valid_amount)) {
		$error_msg = 'مبلغ شارژ صحیح نیست !';
	}
	else{
		$order_id = time();
		$trans_id= 123;
		$param = array(
			'product'		=> 'pin',
			'amount'		=> $amount,
			'mobile'		=> $mobile,
			'operator'		=> $operator,
			'count'			=> $count,
			'order_id'		=> $order_id,
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
$smarty->display('pin.tpl');

?>