<?php
include(dirname( __FILE__ ).'/includes/load.php');

$smarty->assign('internet_active',true);
$smarty->assign('buy_internet',true);
$smarty->assign('title', 'خرید بسته اینترنت');

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
		if( $result!=false ){
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
	
	$mobile 	= (isset($_POST['mobile']) && $_POST['mobile']!='' ) ? filter($_POST['mobile'],'number') : '';
	$amount 	= (isset($_POST['amount']) && $_POST['amount']!='' ) ? filter($_POST['amount']) : '';
	$mnp        = (isset($_POST['mnp']) && $_POST['mnp']==1) ? 1 : '';

	$operator_fa 	= operator_fa($operator);

	if($mobile == ""){
		$error_msg = 'شماره موبایل را وارد کنید !';
	}
	elseif(!$validate->Mobile($mobile)){
		$error_msg = 'شماره موبایل صحیح نیست !';
	}
	else{
		$result = RequestJson('get_products',array());
		if( $result!=false ){
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
						$callback = "{$base_url}/trans.php?product=internet";

						$param = array(
							'amount'		=> $amount,
							'internet_type'	=> $in_type,
							'sim_type'		=> $sim_type,
							'product_id'	=> $product_id,
							'mobile'		=> $mobile,
							'mnp'			=> $mnp,
							'operator'		=> $operator,
							'order_id'		=> $order_id,
							'callback'		=> $callback,
							//'test_mode'		=> $test_mode,
							'pay_type'		=> 'online',
						);
						$result = RequestJson('internet',$param);

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
			}else{
				$error_msg= $result['msg'];
			}
		}else{
			$error_msg = "لطفا کمی بعد دوباره تلاش نمائید";
		}
	}
} //-->submit

if(isset($error_msg)){$smarty->assign('error_msg',$error_msg);}
if(isset($success_msg)){$smarty->assign('success_msg',$success_msg);}
$smarty->display('internet.tpl');

?>