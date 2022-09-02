<?php
/* Smarty version 4.2.0, created on 2022-09-02 13:25:47
  from 'D:\xampp\htdocs\GitHub\inax\sample_code\templates\sidebar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6311c513ac0dc7_94711634',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3010adaf2afe5acc71cb268c385986088a5df49' => 
    array (
      0 => 'D:\\xampp\\htdocs\\GitHub\\inax\\sample_code\\templates\\sidebar.tpl',
      1 => 1662108944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6311c513ac0dc7_94711634 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div> 

	<div class="navbar-default sidebar" role="navigation">
		<div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">
				<li class="sidebar-search">
					<div style="border-bottom: 1px solid rgb(231, 231, 231);text-align: center;font-size: 12px;padding-bottom: 9px;" class="fa_num"><?php echo $_smarty_tpl->tpl_vars['today_date']->value;?>
</div>
					<div style="text-align:center;line-height: 35px !important;margin: 15px 0px 10px 0px !important;">
						<img alt="inax" src="templates/images/logo.png" class="img-circle">
					</div>
				</li>

				<li><a <?php if ((isset($_smarty_tpl->tpl_vars['index_active']->value))) {?>class="active"<?php }?> href="./"><i class="fa fa-home fa-fw"></i> صفحه اصلی</a></li>
				<li><a <?php if ((isset($_smarty_tpl->tpl_vars['charge_active']->value))) {?>class="active"<?php }?> href="topup.php"><i class="fa fa-retweet fa-fw"></i> خرید شارژ مستقیم</a></li>
				<li><a <?php if ((isset($_smarty_tpl->tpl_vars['pin_active']->value))) {?>class="active"<?php }?> href="pin.php"><i class="fa fa-retweet fa-fw"></i> خرید کارت شارژ</a></li>
				<li><a <?php if ((isset($_smarty_tpl->tpl_vars['internet_active']->value))) {?>class="active"<?php }?> href="internet.php"><i class="fa fa-bars fa-fw"></i> بسته اینترنت</a></li>
				<li><a <?php if ((isset($_smarty_tpl->tpl_vars['bill_active']->value))) {?>class="active"<?php }?> href="bill.php"><i class="fa fa-money fa-fw"></i> پرداخت قبض</a></li>
				<!--<li><a <?php if ((isset($_smarty_tpl->tpl_vars['trans_active']->value))) {?>class="active"<?php }?> href="trans.php"><i class="fa fa-money fa-fw"></i> تراکنش ها</a></li>-->
			</ul>
			
		</div>
	</div>
</nav><?php }
}
