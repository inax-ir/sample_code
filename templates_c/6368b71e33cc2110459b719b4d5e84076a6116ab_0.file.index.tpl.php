<?php
/* Smarty version 4.2.0, created on 2022-09-02 12:15:28
  from 'D:\xampp\htdocs\GitHub\inax\sample_code\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6311b4981c8138_80288722',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6368b71e33cc2110459b719b4d5e84076a6116ab' => 
    array (
      0 => 'D:\\xampp\\htdocs\\GitHub\\inax\\sample_code\\templates\\index.tpl',
      1 => 1612598810,
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
function content_6311b4981c8138_80288722 (Smarty_Internal_Template $_smarty_tpl) {
?> <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div id="page-wrapper">
	<div class="spacer"></div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">لیست خدمات</div>
				<div class="panel-body">
				
				<div class="alert alert-info">برای شارژ مستقیم سیم کارت خود لطفا از بخش زیر نسبت به انتخاب اپراتور اقدام نمائید.</div>
					
					<div class="row">
						<div class="col-lg-6 col-md-5 text-center">
							<div class="panel panel-default">
								<a href="topup.php">
									<div class="panel-footer" >
										<span class="text-center"><img src="templates/images/topup.png" /></span>
										<div class="clearfix"></div>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-6 col-md-5 text-center">
							<div class="panel panel-default">
								<a href="pin.php">
									<div class="panel-footer" >
										<span class="text-center"><img src="templates/images/pin.png" /></span>
										<div class="clearfix"></div>
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-5 text-center">
							<div class="panel panel-default">
								<a href="internet.php">
									<div class="panel-footer" >
										<span class="text-center"><img src="templates/images/internet.png" /></span>
										<div class="clearfix"></div>
									</div>
								</a>
							</div>
						</div>
						
						<div class="col-lg-6 col-md-5 text-center">
							<div class="panel panel-default">
								<a href="bill.php">
									<div class="panel-footer" >
										<span class="text-center"><img src="templates/images/bill.png" /></span>
										<div class="clearfix"></div>
									</div>
								</a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
