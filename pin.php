<?php
include(dirname( __FILE__ ).'/includes/load.php');

$smarty->assign('pin_active',true);
$smarty->assign('buy_charge',true);
$smarty->assign('title', 'خرید کارت شارژ');

if(isset($_GET['action']) && $_GET['action']=='list'){
	$smarty->assign('pin_result',true);
	$smarty->assign('title', 'نتیجه خرید شارژ');

	if(isset($_GET['inax_token']) && $_GET['inax_token']!=''){//نتیجه تراکنش
		$inax_token 	= $_GET['inax_token'];
		$decrypted 		= inax_url_decrypt( $inax_token );
		if(!$decrypted['status']){
			$error_msg = 'خطا در تجزیه اطلاعات دریافتی';
		}else{
			parse_str($decrypted['data'], $ir_output);
			$buy_info 	= $ir_output['buy_info'];

			$buyed_products 	= json_decode($buy_info,true);

			$buyed_output ='';
			$call_charge = '';
			if(is_array($buyed_products)){

				foreach($buyed_products as $key => $byued){// به ازای هر تعداد محصول
					$number=$key+1;//برای شروع از یک
					$pin 	= $byued['pin'];
					$serial = $byued['serial'];

					$buyed_output .= "pin {$number}:  {$pin}<br/>";
					$buyed_output .= "serial {$number}:  {$serial}<br/><br/>";
				}
			}

			$ir_output['buyed_output'] = $buyed_output;

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
		$callback = "{$base_url}/pin.php?action=list";

		$param = array(
			'amount'		=> $amount,
			'mobile'		=> $mobile,
			'operator'		=> $operator,
			'count'			=> $count,
			'order_id'		=> $order_id,
			'callback'		=> $callback,
			//'test_mode'		=> $test_mode,
			'pay_type'		=> 'online',
		);
		$result = RequestJson('pin',$param);
		
		if( $result!=false ){
			if($result['code']==1){
				$trans_id   = $result['trans_id'];
				$url        = $result['url'];
				header("Location: {$url}" );
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