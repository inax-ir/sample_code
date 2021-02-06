<?php
include(dirname( __FILE__ ).'/includes/load.php');

$smarty->assign('internet_active',true);
$smarty->assign('buy_internet',true);
$smarty->assign('title', 'خرید بسته اینترنت');

if( isset($_GET['action']) && $_GET['action']=='list'){
	$smarty->assign('internet_list',true);
	$smarty->assign('title', 'نتیجه تراکنش');

	if(isset($_GET['inax_token']) && $_GET['inax_token']!=''){//نتیجه تراکنش
		$inax_token 	= $_GET['inax_token'];
		$decrypted 		= inax_url_decrypt( $inax_token );
		if($decrypted['status']){
			parse_str($decrypted['data'], $ir_output);
			$trans_id 	= $ir_output['id'];
			$order_id 	= $ir_output['order_id'];
			$amount 	= $ir_output['amount'];
			$ref_code	= $ir_output['ref_code'];
			$status 	= $ir_output['status'];
			//print_r($ir_output);

			$smarty->append('pay_result',$ir_output);
		}
	}
}
else{
	$product_find = false;
	if(isset($_GET['MTN']) || isset($_GET['MCI']) || isset($_GET['RTL'])){
		//$smarty->assign('select_package',true);

		if(isset($_GET['MTN']) ){
			$operator = 'MTN';
		}
		elseif(isset($_GET['MCI'])){
			$operator = 'MCI';
		}
		elseif(isset($_GET['RTL'])){
			$operator = 'RTL';
		}
		$smarty->assign('operator',$operator);

		if( (isset($_GET['MTN']) || isset($_GET['MCI']) || isset($_GET['RTL']) ) && !isset($_GET['s']) ){//درخواست نوع سیم کارت
			$smarty->assign('request_sim_type',true);
		}
		elseif( (isset($_GET['MTN']) || isset($_GET['MCI']) || isset($_GET['RTL'])) && isset($_GET['s']) && ($_GET['s']=='credit' || $_GET['s']=='permanent' ) ){
			$smarty->assign('package_list',true);

			$sim_type = $_GET['s'];
			$smarty->assign('sim_type',$sim_type);
			$operator_fa 	= operator_fa($operator);

			$result = RequestJson('get_products',array() );

			if(isset($result['code'])){
				if($result['code']==1){
					$pro = $result['products'];
					//$json = json_decode($pro,true);
					if( !isset($pro['internet']) ){
						$error_msg = "خطا در دریافت بسته های اینترنتی... لطفا دوباره تلاش کنید.";
					}else{
						$internet_package = $pro['internet'];
						//$internet_package 	= $products['products']['InternetPackage'];

						if( !isset($internet_package[$operator]) ){
							$error_msg = " برای اپراتور {$operator_fa} بسته های اینترنتی یافت نشد .";
						}else{
							if(!isset($internet_package[$operator][$sim_type])){
								$sim_type_fa 	= sim_type_fa($sim_type);
								$error_msg = "برای سیم کارت {$sim_type_fa} {$operator_fa} بسته اینترنتی یافت نشد";
							}else{
								$package = $internet_package[$operator][$sim_type];

								//$int_types_list = array('hourly','daily','weekly','monthly','yearly','amazing','TDLTE');
								$int_types_list = array('hourly'=>'ساعتی','daily'=>'روزانه','weekly'=>'هفتگی','monthly'=>'ماهیانه','yearly'=>'سالیانه','amazing'=>'شگفت انگیز','TDLTE'=>'اینترنت ثابت TD-LTE');

								foreach ($int_types_list as $type_en => $type_fa){
									if( isset($package[$type_en]) ){
										$have_package['type_en'] = $type_en;
										$have_package['type_fa'] = $type_fa;

										$have_package['lists2']=array();//جلوگیری از تکرار بسته های روزانه در ماهانه

										foreach ($package[$type_en] as $pid => $pack){
											$id 		= $pack['id'];
											$name 		= $pack['name'];
											$amount 	= $pack['amount'];

											$pack_list2 = array('id'=>$id,'amount'=>$amount, 'name'=>$name);
											$have_package['lists2'][] = $pack_list2;
										}
										$smarty->append('have_package',$have_package);
									}
								}
								$smarty->append('internet_package',$package);
							}
						}
					}
				}else{
					$error_msg= $result['msg'];
				}
			}else{
				$error_msg = "لطفا کمی بعد دوباره تلاش نمائید";
			}
		}

		//مشاهده جزئیات محصول انتخاب شده
		if( isset($_GET['pid']) && $_GET['pid']!='' && (isset($_GET['MTN']) || isset($_GET['MCI']) || isset($_GET['RTL'])) && isset($_GET['s']) && ($_GET['s']=='credit' || $_GET['s']=='permanent' ) && isset($_GET['i']) && ($_GET['i']=='hourly' || $_GET['i']=='daily' || $_GET['i']=='weekly' || $_GET['i']=='monthly' || $_GET['i']=='yearly' || $_GET['i']=='amazing' || $_GET['i']=='TDLTE' ) ){
			$pid		= filter($_GET['pid']);
			$sim_type 	= filter($_GET['s']);
			$in_type 	= filter($_GET['i']);
			if(isset($_GET['MTN']) ){ $operator = 'MTN';	} elseif(isset($_GET['MCI'])){ $operator = 'MCI';	} elseif(isset($_GET['RTL'])){ $operator = 'RTL';	}

			$smarty->assign('package_list',false);
			$smarty->assign('enter_mobile',true);

			$result = RequestJson('get_products',array());
			if(isset($result)){
				if($result['code']==1){
					$pro = $result['products'];
					if( !isset($pro['internet']) ){
						$error_msg = "خطا در دریافت بسته های اینترنتی... لطفا دوباره تلاش کنید.";
					}else{
						$internet_package = $pro['internet'];
						if( !isset($internet_package[$operator][$sim_type][$in_type][$pid]) ){
							$error_msg = " محصول مورد نظر یافت نشد";
						}else{
							$rrr = $internet_package[$operator][$sim_type][$in_type][$pid];
							$product_amount = $rrr['amount'];
							$product_name 	= $rrr['name'];
							$product_id 	= $rrr['id'];

							$smarty->assign('product_id',$product_id);
							$smarty->assign('product_name',$product_name);
							$smarty->assign('product_amount',$product_amount);
							$smarty->assign('buy_internet',true);

							$smarty->assign('internet_type',$in_type);
							$smarty->assign('sim_type',$sim_type);
							$smarty->assign('product_find',true);
						}
					}
				}else{
					$error_msg= $result['msg'];
				}
			}else{
				$error_msg = "لطفا کمی بعد دوباره تلاش نمائید";
			}
		}
	}else{
		$smarty->assign('select_operator',true);
	}


	//ارسال فرم خرید
	if( isset($_POST['submit']) &&  (isset($_GET['MTN']) || isset($_GET['MCI']) || isset($_GET['RTL'])) &&  isset($_GET['pid']) && $_GET['pid']!='' && isset($_GET['s']) && ($_GET['s']=='credit' || $_GET['s']=='permanent' ) && isset($_GET['i']) && ($_GET['i']=='hourly' || $_GET['i']=='daily' || $_GET['i']=='weekly' || $_GET['i']=='monthly' || $_GET['i']=='yearly' || $_GET['i']=='amazing' || $_GET['i']=='TDLTE' ) ){

		$pid 		= filter($_GET['pid']);
		$sim_type 	= filter($_GET['s']);
		$in_type 	= filter($_GET['i']);

		if(isset($_GET['MTN']) ){ $operator = 'MTN';	} elseif(isset($_GET['MCI'])){ $operator = 'MCI';	} elseif(isset($_GET['RTL'])){ $operator = 'RTL';	}

		if(isset($_POST['mobile']) && $_POST['mobile']!='' ){ $mobile = filter($_POST['mobile'],'number'); } else {	$mobile ='';		}
		if(isset($_POST['amount']) && $_POST['amount']!='' ){ $amount = filter($_POST['amount']); } else {	$amount ='';		}
		if(isset($_POST['description']) && $_POST['description']!='' ){ $description = filter($_POST['description']); } else {	$description ='';	}
		if(isset($_POST['failed_trans_id']) && $_POST['failed_trans_id']!='' ){ $failed_trans_id = filter($_POST['failed_trans_id']); } else {	$failed_trans_id ='';	}

		$operator_fa 	= operator_fa($operator);

		if($mobile == ""){
			$error_msg = 'شماره موبایل را وارد کنید !';
		}
		elseif(!$validate->Mobile($mobile)){
			$error_msg = 'شماره موبایل صحیح نیست !';
		}
		else{
			$result = RequestJson('get_products',array());
			if(isset($result)){
				if($result['code']==1){
					$pro = $result['products'];
					if( !isset($pro['internet']) ){
						$error_msg = "خطا در دریافت بسته های اینترنتی... لطفا دوباره تلاش کنید.";
					}else{
						$internet_package = $pro['internet'];

						if( !isset($internet_package[$operator][$sim_type][$in_type][$pid]) ){
							$error_msg = " محصول مورد نظر یافت نشد";
						}else{
							$rrr = $internet_package[$operator][$sim_type][$in_type][$pid];
							$amount 		= $rrr['amount'];
							//$product_name 	= $rrr['name'];
							$product_id 	= $rrr['id'];

							$order_id = time();
							$callback = "{$base_url}/internet.php?action=list";

							$param = array(
								'product'		=> 'internet',
								'amount'		=> $amount,
								'internet_type'	=> $in_type,
								'sim_type'		=> $sim_type,
								'product_id'	=> $product_id,
								'mobile'		=> $mobile,
								'operator'		=> $operator,
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
				}else{
					$error_msg= $result['msg'];
				}
			}else{
				$error_msg = "لطفا کمی بعد دوباره تلاش نمائید";
			}
		}
	} //-->submit
}

function operator_fa($operator){
	switch ($operator) {
		case 'MTN':		$operator_fa = 'ایرانسل';break;
		case 'MCI':		$operator_fa = 'همراه اول';break;
		case 'RTL':		$operator_fa = 'رایتل';break;
		default : 		$operator_fa = ""; break;
	}
	return $operator_fa;
}

if(isset($error_msg)){$smarty->assign('error_msg',$error_msg);}
if(isset($success_msg)){$smarty->assign('success_msg',$success_msg);}
$smarty->display('internet.tpl');

?>