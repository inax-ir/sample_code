<?php
include(dirname( __FILE__ ).'/includes/load.php');

$smarty->assign('bill_active',true);
$smarty->assign('title', 'پرداخت قبض');

if(isset($_GET['id']) && $_GET['id']!=''){
	$smarty->assign('bill_active',false);
	$smarty->assign('bill_result',true);
	$smarty->assign('title', 'نتیجه تراکنش');

	if(isset($_GET['inax_token']) && $_GET['inax_token']!=''){//نتیجه تراکنش
		$inax_token 	= $_GET['inax_token'];
		$decrypted 		= inax_url_decrypt( $inax_token );
		if($decrypted['status']){
			parse_str($decrypted['data'], $ir_output);
			$trans_id 	= $ir_output['id'];
			$order_id 	= $ir_output['order_id'];
			$ref_code	= $ir_output['ref_code'];
			$status 	= $ir_output['status'];
			print_r($ir_output);

			$order_id = substr($order_id, 0, -3);

			$date 	= date('Y-m-d H:i:s');
			$pay_bill_result = json_encode($ir_output,JSON_UNESCAPED_UNICODE);

			if($status == 'paid'){
				$mysqli->query("update bill set status='$status',refcode='$ref_code',pay_date='$date',pay_bill_result='$pay_bill_result' where id='$order_id' and status='unpaid' ");
			}else{
				$mysqli->query("update bill set status='$status',pay_bill_result='$pay_bill_result' where id='$order_id' ");
			}
		}
	}

	//پایین باشد
	$bill_id= filter($_GET['id']);
	$sql_bill = $mysqli->query("SELECT * FROM bill where id='$bill_id' ORDER BY id DESC ");
	while($rows_bill = $sql_bill->fetch_assoc() ){
		$rows_bill['name_family'] 	= 'مهمان';
		$smarty->append('rows_bill', $rows_bill);
	}
}

if(isset($_GET['check_bill']) ){
	
	if(isset($_POST['bill_id']) && $_POST['bill_id']!='' ){ $bill_id = filter($_POST['bill_id'],'number'); } else {	$bill_id ='';		}
	if(isset($_POST['pay_id']) && $_POST['pay_id']!='' ){ $pay_id = filter($_POST['pay_id'],'number'); } else {	$pay_id ='';	}
	if(isset($_POST['mobile']) && $_POST['mobile']!='' ){ $mobile = filter($_POST['mobile'],'number'); } else {	$mobile ='';}
	
	if($bill_id == ""){
		$error_msg = 'لطفا شناسه قبض را وارد کنید !';
	}
	elseif($pay_id == ""){
		$error_msg = 'لطفا شناسه پرداخت را وارد کنید !';
	}
	elseif(!$validate->Number($bill_id)){
		$error_msg = 'شناسه قبض صحیح نیست !';
	}
	elseif(!$validate->Number($pay_id)){
		$error_msg = 'شناسه پرداخت صحیح نیست !';
	}
	elseif(!$validate->Mobile($mobile)){
		$error_msg = 'شماره موبایل صحیح نیست !';
	}
	else{
		$param = array(
			'bill_id'		=> $bill_id,
			'pay_id'		=> $pay_id,
		);
		$result = RequestJson('check_bill',$param);

		if(isset($result)){
			$res_code = $result['code'];
			if($res_code!=1){
				$error_msg = $result['msg'];
			}else{
				$type_en 		= $result['type_en'];
				$amount 		= $result['amount'];
				$pay_type 		= $result['pay_type'];
				$amount_rial 	= $amount*10; // تبدیل به ریال
				$bill_type_name = bill_type($type_en);
				
				if($pay_type=='online'){
					$pay_type_fa = 'پرداخت آنلاین';
				}elseif($pay_type=='credit'){
					$pay_type_fa = 'پرداخت از اعتبار';
				}
				
				$check_bill_result = json_encode($result,JSON_UNESCAPED_UNICODE);
				
				$date 	= date('Y-m-d H:i:s');
				$mysqli->query("INSERT INTO bill ( mobile,bill_id, pay_id,bill_type, amount,check_bill_result,pay_type, date ) VALUES ('$mobile','$bill_id', '$pay_id', '$type_en', '$amount_rial', '$check_bill_result', '$pay_type', '$date' )");
				$db_id = $mysqli->insert_id;

				$_SESSION['bill_db_id'] = $db_id;
				$error_msg = 'no';
			}
		}
	}
	if($error_msg =='no'){
		echo json_encode( array( "error_msg"=>$error_msg, "type"=>$bill_type_name, "pay_type"=>$pay_type_fa, "amount" => number_format($amount_rial) ) ); 
	}else{
		echo json_encode( array( "error_msg"=>$error_msg ) ); 
	}
	exit;
}

if(isset($_POST['pay_submit']) ){
	
	if( empty($_SESSION['bill_db_id']) || $_SESSION['bill_db_id']=='' ) {
		$error_msg = 'شناسه پرداخت موجود نیست';
	}
	else{
		$db_id 		= $_SESSION['bill_db_id'];
		$bill_row 	= $mysqli->query("SELECT * FROM bill WHERE id='$db_id' ")->fetch_assoc();
		if( !isset($bill_row['id']) ){
			$error_msg = 'چنین صورتحسابی یافت نشد';
		}else{
			$bill_id 	= $bill_row['bill_id'];
			$pay_id 	= $bill_row['pay_id'];
			$mobile 	= $bill_row['mobile'];
			$amount 	= $bill_row['amount'];
			
			$callback = "{$base_url}/bill.php?action=list&id=$db_id";
			$param = array(
				'bill_id'		=> $bill_id,
				'pay_id'		=> $pay_id,
				'mobile'		=> $mobile,
				'order_id'		=> $db_id.rand(100, 999),//در آینکس نباید تکراری باشد
				'callback'		=> $callback,
				'test_mode'		=> $test_mode,
			);
			$result = RequestJson('pay_bill',$param,'inax');
			
			if(isset($result)){
				$res_code = $result['code'];
				if($res_code!=1){
					$error_msg = $result['msg'];
				}else{
					$type_en 		= $result['type_en'];
					$amount 		= $result['amount'];
					$url 			= $result['url'];
					$pay_type 		= $result['pay_type'];

					$pay_bill_result = json_encode($result,JSON_UNESCAPED_UNICODE);
					$mysqli->query("update bill set pay_type='$pay_type',url='$url', pay_bill_result='$pay_bill_result' where id='$db_id' ");
					
					if($pay_type=='online'){
						header( "Location: {$url}" );
					}
					else{
						$clients_rows 	= Get_Clients_Rows('id',$client_id);
						$credit = $clients_rows['credit'];
						if($credit < $amount){
							$error_msg = "موجودی حساب کاربری شما جهت انجام این تراکنش کافی نیست !";
							$mysqli->query("update bill set code='-2020',date='$date' where id='$db_id' ");
						}else{
							echo "oflline";
						}
					}
				}
			}
		}
	}
}

if(isset($error_msg)){$smarty->assign('error_msg',$error_msg);}
if(isset($success_msg)){$smarty->assign('success_msg',$success_msg);}
$smarty->display('bill.tpl');
?>