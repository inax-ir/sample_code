<?php
include(dirname( __FILE__ ).'/includes/load.php');

$smarty->assign('trans_active',true);

//$smarty->assign('trans_list',true);
$smarty->assign('title', 'لیست تراکنش ها');

//echo '<pre>'. print_r($_POST,true) . '</pre>';

if( isset($_GET['product']) && isset($_POST['id']) && isset($_POST['order_id']) && isset($_POST['amount']) && isset($_POST['ref_code']) && isset($_POST['status'])  && isset($_POST['hash'])){
	$product 	= filter($_GET['product']);
	$trans_id 	= filter($_POST['id']);
	$order_id 	= filter($_POST['order_id']);
	$amount 	= filter($_POST['amount']);
	$ref_code	= filter($_POST['ref_code']);
	$status 	= filter($_POST['status']);
	$inax_hash 	= filter($_POST['hash']);

	$for_hash 	= "$trans_id:$username:$password";
	$hash 		= md5($for_hash);

	if( $hash!=$inax_hash ){
		$error_msg = "encoding error";
	}
	else{
		$trans['product'] 	= $product;
		$trans['id'] 		= $trans_id;
		$trans['order_id'] 	= $order_id;
		$trans['amount'] 	= $amount;
		$trans['ref_code'] 	= $ref_code;
		$trans['status'] 	= $status;

		if($product=='pin'){
			$buy_info 	= $_POST['buy_info'];

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

			$trans['buyed_output'] = $buyed_output;
		}
		if($product=='bill'){
			$bill_id 			= substr($order_id, 0, -3);

			$date 				= date('Y-m-d H:i:s');
			$pay_bill_result 	= json_encode($_POST,JSON_UNESCAPED_UNICODE);

			if($status == 'paid'){
				$mysqli->query("update bill set status='$status',refcode='$ref_code',pay_date='$date',pay_bill_result='$pay_bill_result' where id='$bill_id' and status='unpaid' ");
			}else{
				$mysqli->query("update bill set status='$status',pay_bill_result='$pay_bill_result' where id='$bill_id' ");
			}

			$bill_id1= filter($_GET['id']);
			$sql_bill = $mysqli->query("SELECT * FROM bill where id='$bill_id1' ORDER BY id DESC limit 1");
			while($rows_bill = $sql_bill->fetch_assoc() ){
			
				$trans['mobile'] 	= $rows_bill['mobile'];
				$trans['bill_id'] 	= $rows_bill['bill_id'];
				$trans['pay_id'] 	= $rows_bill['pay_id'];
				$trans['bill_type'] = $rows_bill['bill_type'];
				$trans['pay_date'] 	= $rows_bill['pay_date'];
			}
		}

		$smarty->append('trans_result',$trans);
	}
}
else{
	$error_msg = "undefined callback parameters";
}

if(isset($error_msg)){$smarty->assign('error_msg',$error_msg);}
if(isset($success_msg)){$smarty->assign('success_msg',$success_msg);}
$smarty->display('trans.tpl');
?>