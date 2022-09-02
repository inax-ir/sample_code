<?php
/* Smarty version 4.2.0, created on 2022-09-02 13:25:47
  from 'D:\xampp\htdocs\GitHub\inax\sample_code\templates\trans.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6311c5139999a1_85671919',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11efc040c54d20fc4c55129c61bbba9051bea867' => 
    array (
      0 => 'D:\\xampp\\htdocs\\GitHub\\inax\\sample_code\\templates\\trans.tpl',
      1 => 1662108687,
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
function content_6311c5139999a1_85671919 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 
<div id="page-wrapper">
	<div class="spacer"></div>

	<div class="row">
		<div class="col-lg-12">

			<div class="panel panel-yellow">	
				<div class="panel-heading"><i class="fa fa-sitemap fa-fw"></i> تراکنش ها</div>
				<div class="panel-body">

					<?php if ((isset($_smarty_tpl->tpl_vars['success_msg']->value))) {?><div class="alert alert-success"><?php echo $_smarty_tpl->tpl_vars['success_msg']->value;?>
</div><?php }?>
					<?php if ((isset($_smarty_tpl->tpl_vars['error_msg']->value))) {?><div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
</div><?php }?>
					
					<?php if ((isset($_smarty_tpl->tpl_vars['trans_result']->value))) {?>
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" >
						<?php if ((isset($_smarty_tpl->tpl_vars['trans_result']->value))) {?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['trans_result']->value, 'link', false, 'key');
$_smarty_tpl->tpl_vars['link']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['link']->value) {
$_smarty_tpl->tpl_vars['link']->do_else = false;
?>
							<tr><th style="width:20%">شناسه تراکنش</th><td><?php echo $_smarty_tpl->tpl_vars['link']->value['id'];?>
</td></tr>
							<tr><th>مبلغ تراکنش</th><td><?php echo number_format($_smarty_tpl->tpl_vars['link']->value['amount']);?>
 تومان</td></tr>
							<?php if ($_smarty_tpl->tpl_vars['link']->value['ref_code'] != '') {?><th>شماره پیگیری</th><td><?php echo $_smarty_tpl->tpl_vars['link']->value['ref_code'];?>
</td></tr><?php }?>
							<tr><th>شماره سفارش</th><td><?php echo $_smarty_tpl->tpl_vars['link']->value['order_id'];?>
</td></tr>
							
							<?php if ($_smarty_tpl->tpl_vars['link']->value['product'] == 'pin' && (isset($_smarty_tpl->tpl_vars['link']->value['buyed_output']))) {?>
							<tr>
								<th>اطلاعات خرید</th>
								<td><?php echo $_smarty_tpl->tpl_vars['link']->value['buyed_output'];?>
</td>
							</tr>
							<?php }?>

							<?php if ($_smarty_tpl->tpl_vars['link']->value['product'] == 'bill') {?>
							<tr>
								<th width="200px">شناسه قبض</th>
								<td><?php echo $_smarty_tpl->tpl_vars['link']->value['bill_id'];?>
</td>
							</tr>
							<tr>
								<th width="200px">شناسه پرداخت</th>
								<td><?php echo $_smarty_tpl->tpl_vars['link']->value['pay_id'];?>
</td>
							</tr>
							<tr>
								<th>نوع قبض</th>
								<td><?php echo bill_type($_smarty_tpl->tpl_vars['link']->value['bill_type']);?>
</td>
							</tr>
							<tr>
								<th width="200px">موبایل</th>
								<td><?php echo $_smarty_tpl->tpl_vars['link']->value['mobile'];?>
</td>
							</tr>
							<?php if ($_smarty_tpl->tpl_vars['link']->value['status'] == 'paid') {?>
							<tr>
								<th>تاریخ پرداخت</th>
								<td><?php echo jdate_format($_smarty_tpl->tpl_vars['link']->value['pay_date']);?>
</td>
							</tr>
							<?php }?>
							<?php }?>

							<tr><th>نتیجه</th><td><?php if ($_smarty_tpl->tpl_vars['link']->value['status'] == 'paid') {?><span class="label label-success">پرداخت شده</span><?php } elseif ($_smarty_tpl->tpl_vars['link']->value['status'] == 'unpaid') {?><span class="label label-danger">پرداخت نشده</span><?php }?></td></tr>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						<?php }?>
						</table>
					</div>
					<?php }?>
				</div>
			</div>

		</div>
	</div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
