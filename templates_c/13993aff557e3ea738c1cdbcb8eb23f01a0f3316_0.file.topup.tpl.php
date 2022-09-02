<?php
/* Smarty version 4.2.0, created on 2022-09-02 12:15:59
  from 'D:\xampp\htdocs\GitHub\inax\sample_code\templates\topup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6311b4b7e5cc20_61210633',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13993aff557e3ea738c1cdbcb8eb23f01a0f3316' => 
    array (
      0 => 'D:\\xampp\\htdocs\\GitHub\\inax\\sample_code\\templates\\topup.tpl',
      1 => 1614926784,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:sidebar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6311b4b7e5cc20_61210633 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 
<div id="page-wrapper">
	<div class="spacer"></div>

	<div class="row">
		<div class="col-lg-12">
				
			<?php if ((isset($_smarty_tpl->tpl_vars['buy_charge']->value)) && !(isset($_smarty_tpl->tpl_vars['mtn_active']->value)) && !(isset($_smarty_tpl->tpl_vars['mci_active']->value)) && !(isset($_smarty_tpl->tpl_vars['rtl_active']->value)) && !(isset($_smarty_tpl->tpl_vars['bill_active']->value)) && !(isset($_smarty_tpl->tpl_vars['topup_result']->value))) {?>
			<div class="panel panel-default">
				<div class="panel-heading"><i class="fa fa-sitemap fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 </div>
				<div class="panel-body">
				
				<div class="alert alert-info">برای شارژ مستقیم سیم کارت خود لطفا از بخش زیر نسبت به انتخاب اپراتور اقدام نمائید.</div>
					
					<div class="col-lg-4 col-md-5 text-center">
						<div class="panel panel-default">
							<a href="topup.php?MTN">
								<div class="panel-footer" >
									<span class="text-center"><img src="templates/images/mtn.png" /></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-5 text-center">
						<div class="panel panel-default">
							<a href="topup.php?MCI">
								<div class="panel-footer" >
									<span class="text-center"><img src="templates/images/mci.png" /></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-5 text-center">
						<div class="panel panel-default">
							<a href="topup.php?RTL">
								<div class="panel-footer" >
									<span class="text-center"><img src="templates/images/rtl.png" /></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>

				</div>
			</div>
			<?php }?>
			

			<?php if ((isset($_smarty_tpl->tpl_vars['mtn_active']->value)) || (isset($_smarty_tpl->tpl_vars['mci_active']->value)) || (isset($_smarty_tpl->tpl_vars['rtl_active']->value))) {?>
			<div class="panel panel-<?php if ((isset($_smarty_tpl->tpl_vars['mtn_active']->value))) {?>yellow<?php } elseif ((isset($_smarty_tpl->tpl_vars['mci_active']->value))) {?>primary<?php } elseif ((isset($_smarty_tpl->tpl_vars['rtl_active']->value))) {?>danger<?php }?>">	
				<div class="panel-heading"><i class="fa fa-sitemap fa-fw"></i> خرید شارژ اعتباری <?php if ((isset($_smarty_tpl->tpl_vars['mtn_active']->value))) {?>ایرانسل<?php } elseif ((isset($_smarty_tpl->tpl_vars['mci_active']->value))) {?>همراه اول<?php } elseif ((isset($_smarty_tpl->tpl_vars['rtl_active']->value))) {?>رایتل<?php }?> </div>
				<div class="panel-body">
				
				<?php if ((isset($_smarty_tpl->tpl_vars['pay_code']->value))) {?>
				<?php echo '<script'; ?>
 src="../assets/js/clients/fakeLoader.js"><?php echo '</script'; ?>
>
				<link href="../assets/css/clients/fakeLoader.css" rel="stylesheet">

					<style>
					.dot1{
						<?php if ($_smarty_tpl->tpl_vars['gateway']->value == 'mellat' || $_smarty_tpl->tpl_vars['gateway']->value == 'city') {?>
							background-color: #ee4a52 !important;
						<?php } elseif ($_smarty_tpl->tpl_vars['gateway']->value == 'saman' || $_smarty_tpl->tpl_vars['gateway']->value == 'parsian') {?>
							background-color: #6ea8ff !important;
						<?php } elseif ($_smarty_tpl->tpl_vars['gateway']->value == 'pasargad') {?>
							background-color: #efc316 !important;
						<?php } elseif ($_smarty_tpl->tpl_vars['gateway']->value == 'melli') {?>
							background-color: #a1dd8d !important;
						<?php }?>
					}
					.dot2 {
						<?php if ($_smarty_tpl->tpl_vars['gateway']->value == 'mellat' || $_smarty_tpl->tpl_vars['gateway']->value == 'city') {?>
							background-color: #c92f37 !important;
						<?php } elseif ($_smarty_tpl->tpl_vars['gateway']->value == 'saman' || $_smarty_tpl->tpl_vars['gateway']->value == 'parsian') {?>
							background-color: #428bca !important;
						<?php } elseif ($_smarty_tpl->tpl_vars['gateway']->value == 'pasargad') {?>
							background-color: #efc316 !important;
						<?php } elseif ($_smarty_tpl->tpl_vars['gateway']->value == 'melli') {?>
							background-color: #7fba6b !important;
						<?php }?>
					}
					</style>
					<div class="fakeloader"></div>
					<?php echo '<script'; ?>
>
						$(document).ready(function(){
							$(".fakeloader").fakeLoader({
								spinner:"spinner3"
							});
						});
					<?php echo '</script'; ?>
>
					<?php echo $_smarty_tpl->tpl_vars['pay_code']->value;?>

				<?php } else { ?>
				
				
					<div class="alert alert-info">لطفا از بخش زیر شماره تلفن و مبلغ شارژ را وارد نمائید</div>
					
					<?php if ((isset($_smarty_tpl->tpl_vars['error_msg']->value))) {?><div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
</div><?php }?>
					<div class="table-responsive">
						
						<form action="topup.php?<?php if ((isset($_smarty_tpl->tpl_vars['mtn_active']->value))) {?>MTN<?php } elseif ((isset($_smarty_tpl->tpl_vars['mci_active']->value))) {?>MCI<?php } elseif ((isset($_smarty_tpl->tpl_vars['rtl_active']->value))) {?>RTL<?php }?>" id="buy_form" method="POST" >
							<table class="table table-striped table-hover text-center" >
								<tr>
									<td></td>
									<td>
										<div class="form-group has-warning input-group">
										<!--onkeyup="hide_invoice();"-->
											<input type="text" maxlength="11" placeholder="شماره تلفن همراه"  dir="ltr" class="form-control" id="mobile" name="mobile" value="<?php if ((isset($_POST['mobile']))) {
echo $_POST['mobile'];
} elseif ((isset($_smarty_tpl->tpl_vars['mobile']->value))) {
echo $_smarty_tpl->tpl_vars['mobile']->value;
} else {
}?>" tabindex="1" required/>
											<span class="input-group-addon"><i class="fa fa-phone fa-fw fa-1x"></i></span>
										</div>
									</td>
									<td></td>
								</tr>
								<tr>
									<td><?php if ((isset($_smarty_tpl->tpl_vars['mtn_active']->value))) {?><input type="radio" name="amount" value="500" id="500" <?php if ((isset($_POST['amount'])) && $_POST['amount'] == '500') {?>checked<?php }?> required/> <label for="500"> شارژ <?php if ((isset($_smarty_tpl->tpl_vars['mtn_active']->value))) {?>ایرانسل<?php } elseif ((isset($_smarty_tpl->tpl_vars['mci_active']->value))) {?>همراه اول<?php } elseif ((isset($_smarty_tpl->tpl_vars['rtl_active']->value))) {?>رایتل<?php }?> <span class="fa_num">500</span> تومانی</label><?php }?></td>
									<td><input type="radio" name="amount" value="1000" id="1000" <?php if ((isset($_POST['amount'])) && $_POST['amount'] == '1000') {?>checked<?php }?> required/> <label for="1000"> شارژ <?php if ((isset($_smarty_tpl->tpl_vars['mtn_active']->value))) {?>ایرانسل<?php } elseif ((isset($_smarty_tpl->tpl_vars['mci_active']->value))) {?>همراه اول<?php } elseif ((isset($_smarty_tpl->tpl_vars['rtl_active']->value))) {?>رایتل<?php }?> <span class="fa_num">1,000</span> تومانی</label></td>
									<td><input type="radio" name="amount" value="2000" id="2000" <?php if ((isset($_POST['amount'])) && $_POST['amount'] == '2000') {?>checked<?php }?> required/> <label for="2000"> شارژ <?php if ((isset($_smarty_tpl->tpl_vars['mtn_active']->value))) {?>ایرانسل<?php } elseif ((isset($_smarty_tpl->tpl_vars['mci_active']->value))) {?>همراه اول<?php } elseif ((isset($_smarty_tpl->tpl_vars['rtl_active']->value))) {?>رایتل<?php }?> <span class="fa_num">2,000</span> تومانی</label></td>
									
								</tr>
								<tr>
									<td><input type="radio" name="amount" value="5000" id="5000" <?php if ((isset($_POST['amount'])) && $_POST['amount'] == '5000') {?>checked<?php }?> required/> <label for="5000"> شارژ <?php if ((isset($_smarty_tpl->tpl_vars['mtn_active']->value))) {?>ایرانسل<?php } elseif ((isset($_smarty_tpl->tpl_vars['mci_active']->value))) {?>همراه اول<?php } elseif ((isset($_smarty_tpl->tpl_vars['rtl_active']->value))) {?>رایتل<?php }?> <span class="fa_num">5,000</span> تومانی</label></td>
									<td><input type="radio" name="amount" value="10000" id="10000" <?php if ((isset($_POST['amount'])) && $_POST['amount'] == '10000') {?>checked<?php }?> required/> <label for="10000"> شارژ <?php if ((isset($_smarty_tpl->tpl_vars['mtn_active']->value))) {?>ایرانسل<?php } elseif ((isset($_smarty_tpl->tpl_vars['mci_active']->value))) {?>همراه اول<?php } elseif ((isset($_smarty_tpl->tpl_vars['rtl_active']->value))) {?>رایتل<?php }?> <span class="fa_num">10,000</span> تومانی</label></td>
									<td><input type="radio" name="amount" value="20000" id="20000" <?php if ((isset($_POST['amount'])) && $_POST['amount'] == '20000') {?>checked<?php }?> required/> <label for="20000"> شارژ <?php if ((isset($_smarty_tpl->tpl_vars['mtn_active']->value))) {?>ایرانسل<?php } elseif ((isset($_smarty_tpl->tpl_vars['mci_active']->value))) {?>همراه اول<?php } elseif ((isset($_smarty_tpl->tpl_vars['rtl_active']->value))) {?>رایتل<?php }?> <span class="fa_num">20,000</span> تومانی</label></td>
								</tr>
								<?php if ((isset($_smarty_tpl->tpl_vars['mtn_active']->value))) {?>
								<!--<tr>
									<td><input type="radio" name="amount" value="30000" id="30000" <?php if ((isset($_POST['amount'])) && $_POST['amount'] == '30000') {?>checked<?php }?> required/> <label for="30000"> شارژ <?php if ((isset($_smarty_tpl->tpl_vars['mtn_active']->value))) {?>ایرانسل<?php } elseif ((isset($_smarty_tpl->tpl_vars['mci_active']->value))) {?>همراه اول<?php } elseif ((isset($_smarty_tpl->tpl_vars['rtl_active']->value))) {?>رایتل<?php }?> <span class="fa_num">30,000</span> تومانی</label></td>
									<td><input type="radio" name="amount" value="40000" id="40000" <?php if ((isset($_POST['amount'])) && $_POST['amount'] == '40000') {?>checked<?php }?> required/> <label for="40000"> شارژ <?php if ((isset($_smarty_tpl->tpl_vars['mtn_active']->value))) {?>ایرانسل<?php } elseif ((isset($_smarty_tpl->tpl_vars['mci_active']->value))) {?>همراه اول<?php } elseif ((isset($_smarty_tpl->tpl_vars['rtl_active']->value))) {?>رایتل<?php }?> <span class="fa_num">40,000</span> تومانی</label></td>
									<td><input type="radio" name="amount" value="50000" id="50000" <?php if ((isset($_POST['amount'])) && $_POST['amount'] == '50000') {?>checked<?php }?> required/> <label for="50000"> شارژ <?php if ((isset($_smarty_tpl->tpl_vars['mtn_active']->value))) {?>ایرانسل<?php } elseif ((isset($_smarty_tpl->tpl_vars['mci_active']->value))) {?>همراه اول<?php } elseif ((isset($_smarty_tpl->tpl_vars['rtl_active']->value))) {?>رایتل<?php }?> <span class="fa_num">50,000</span> تومانی</label></td>
								</tr>-->
								<?php }?>
								<tr>
									<td>نوع شارژ</td>
									<td>
										<select name="charge_type" id="charge_type" class="myform-control" style="cursor:pointer;" required="">
											<option value="">- - - - انتخاب کنید - - - -</option>
											<option value="normal">شارژ معمولی</option>
											<option value="amazing">شارژ شگفت انگیز</option>											
											<option value="mnp">شارژ سیم کارت ترابرد شده</option>
											<option value="permanent">شارژ سیم کارت دایمی</option>										
										</select>
									</td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td>
									<input name="btnSubmit" style="display:none;" type="hidden" />
									<!--<a href="#" class="btn btn-success form-control" ><i class="fa fa-check"></i> صدور فاکتور پرداخت</button>-->
									<a class="btn btn-warning" data-toggle="collapse" data-parent="#accordion" onclick="display_invoice()" href="#collapseTwo" style="color:white;" ><i class="fa fa-edit"></i> صدور فاکتور پرداخت</a>
									</td>
									<td></td>
								</tr>
							</table>
						</form>
						
						<div class="panel-group" id="accordion">
							<div class="panel panel-info service_status">
								
								<div style="<?php if ((isset($_POST['submit']))) {
} else { ?>height:0px;<?php }?>" id="collapseTwo" class="panel-collapse collapse <?php if ((isset($_POST['submit']))) {?>in<?php }?>" >
									<div class="panel-body">
									
										<table class="table table-striped table-bordered ">
											<tr>
												<td>شماره موبایل</td>
												<td><span id="invoice_mobile" ></span></td>
											</tr>
											<tr>
												<td>مبلغ شارژ</td>
												<td><span id="invoice_amount" ></span></td>
											</tr>
											<tr>
												<td>نوع شارژ</td>
												<td><span id="invoice_charge_type" ></span></td>
											</tr>
												<tr>
												<td>پرداخت</td>
												<td><button class="btn btn-success form-control" id="submit_btn" href="#" style="color:white;" ><i class="fa fa-check"></i> پرداخت و شارژ مستقیم سیم کارت</button></td>
											</tr>
										</table>
										
										
										<?php echo '<script'; ?>
>
										function display_invoice(){
											var mobile = $('#mobile').get(0).value;
											$('#invoice_mobile').html(mobile);
											
											/*
											var amount = $("input[name='amount']:checked"). text();
											if(amount){
												$('#invoice_amount').html(amount);
											}*/
											
											$("input[type='radio']:checked").each(function() {
												var idVal = $(this).attr("id");
												var amount = $("label[for='"+idVal+"']").text();
												$('#invoice_amount').html(amount);
											});
																					
											//var charge_type = $(this).find('option:selected').val();
											var charge_type =  $('#charge_type option:selected').text();
											$('#invoice_charge_type').html(charge_type);
										}
										
										//حین تغییر در مقدار موبایل
										$("#mobile").keydown (keyPress);
										function keyPress(e){
											if( $('#collapseTwo').hasClass('in')===true ){
												$('#collapseTwo').collapse('hide');
											}
										}
										
										//حین تغییر در مبلغ
										$("input[name='amount']").change(function() {
											//var val = $("input[type='radio'][name='floors']:checked").val();
											//alert(val);
											if( $('#collapseTwo').hasClass('in')===true ){
												$('#collapseTwo').collapse('hide');
											}
										});
										
										//حین تغییر در مقدار نوع شارژ
										 $("#charge_type").change(function () {
											if( $('#collapseTwo').hasClass('in')===true ){
												$('#collapseTwo').collapse('hide');
											}
										});
										
										function hide_invoice(){
											if( $('#collapseTwo').hasClass('in')===true ){
												$('#collapseTwo').collapse('hide');
											}
										}
										
										var form = document.getElementById("buy_form");
										document.getElementById("submit_btn").addEventListener("click", function () {
											form.submit();
										});
										
										<?php echo '</script'; ?>
>
									</div>
								</div>
								<div style="clear:both"></div>
							</div>
						</div>
						
					</div>
					<?php }?>
				</div>
			</div>
			<?php }?>
			
			<?php if ((isset($_smarty_tpl->tpl_vars['topup_result']->value))) {?>
			<div class="panel panel-yellow">	
				<div class="panel-heading"><i class="fa fa-sitemap fa-fw"></i> نتیجه خرید </div>
				<div class="panel-body">
					
					<?php if ((isset($_smarty_tpl->tpl_vars['success_msg']->value))) {?><div class="alert alert-success"><?php echo $_smarty_tpl->tpl_vars['success_msg']->value;?>
</div><?php }?>
					<?php if ((isset($_smarty_tpl->tpl_vars['error_msg']->value))) {?><div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
</div><?php }?>
				
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" >
						<?php if ((isset($_smarty_tpl->tpl_vars['topup_rows']->value))) {?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['topup_rows']->value, 'link', false, 'key');
$_smarty_tpl->tpl_vars['link']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['link']->value) {
$_smarty_tpl->tpl_vars['link']->do_else = false;
?>
							<tr><th style="width:20%">شناسه تراکنش</th><td><?php echo $_smarty_tpl->tpl_vars['link']->value['id'];?>
</td></tr>
							<tr><th>مبلغ شارژ</th><td><?php echo number_format($_smarty_tpl->tpl_vars['link']->value['amount']);?>
 تومان</td></tr>
							<?php if ($_smarty_tpl->tpl_vars['link']->value['ref_code'] != '') {?><th>شماره پیگیری</th><td><?php echo $_smarty_tpl->tpl_vars['link']->value['ref_code'];?>
</td></tr><?php }?>
							<tr><th>شماره سفارش</th><td><?php echo $_smarty_tpl->tpl_vars['link']->value['order_id'];?>
</td></tr>
							<tr><th>نتیجه</th><td><?php if ($_smarty_tpl->tpl_vars['link']->value['status'] == 'paid') {?><span class="label label-success">پرداخت شده</span><?php } elseif ($_smarty_tpl->tpl_vars['link']->value['status'] == 'unpaid') {?><span class="label label-danger">پرداخت نشده</span><?php }?></td></tr>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						<?php }?>
						</table>
					</div>
				</div>
			</div>
			<?php }?>
			

			</div><!-- /.panel -->
		</div>
	</div>
</div><!-- /#page-wrapper -->

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
