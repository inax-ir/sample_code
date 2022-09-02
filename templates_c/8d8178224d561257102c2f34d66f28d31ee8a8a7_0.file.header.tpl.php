<?php
/* Smarty version 4.2.0, created on 2022-09-02 12:15:28
  from 'D:\xampp\htdocs\GitHub\inax\sample_code\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6311b49821ea29_95401491',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8d8178224d561257102c2f34d66f28d31ee8a8a7' => 
    array (
      0 => 'D:\\xampp\\htdocs\\GitHub\\inax\\sample_code\\templates\\header.tpl',
      1 => 1612598763,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6311b49821ea29_95401491 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<?php if ((isset($_smarty_tpl->tpl_vars['base_url']->value))) {?><base href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/" ><?php }?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	<link rel="shortcut icon" href="favicon.png" type="image/x-icon" />
	<link href="templates/css/bootstrap.css" rel="stylesheet">
   <!-- <link href="templates/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">-->
    <link href="templates/css/sb-admin-2.css" rel="stylesheet">
    <link href="templates/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <?php echo '<script'; ?>
 src="templates/js/jquery-1.12.3.min.js"><?php echo '</script'; ?>
>

	<!--<?php echo '<script'; ?>
 type="text/javascript" src="js/clients/support.js"><?php echo '</script'; ?>
>-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->

</head>

<body class="rtl">
    <div id="wrapper">

 	<div class="top-bar">
		<div class="container autowidth">
			<div class="site-branding col-lg-2 col-md-2">
				<div class="site-title"><a href="index.php" rel="home"><img title="خرید شارژ" src="templates/images/logo-top.png" width="125" height="30" /></a></div>
			</div>
			<button class="menu-toggle btn"><i class="fa fa-bars"></i></button>
			<nav id="site-navigation" class="main-navigation col-lg-10 col-md-10" role="navigation" >
				<div class="menu-all-pages-container">
					<ul id="menu-all-pages" class="menu">

						<!--<li class="menu-item menu-item-type-post_type menu-item-object-page for_links"><a href="https://telegram.me/inaxir" target="_blank" title="جهت عضویت در کانال تلگرام اینجا کلیک کنید" ><span class="fa fa-send"></span><span class="link_txt"> عضویت در کانال تلگرام</span></a></li>-->
						
						<li class="menu-item menu-item-type-post_type menu-item-object-page for_links"><a href="index.php?contact-us" title="تماس با ما" ><span class="fa fa-phone"></span><span class="link_txt"> تماس با ما</span></a></li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page for_links"><a href="index.php?about-us" title="درباره ما" ><span class="fa fa-link"></span><span class="link_txt"> درباره ما</span></a></li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page for_links"><a href="index.php?terms" title="قوانین" ><span class="fa fa-link"></span><span class="link_txt"> قوانین سایت</span></a></li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page for_links"><a href="index.php?shekayat" title="ثبت شکایات" ><span class="fa fa-link"></span><span class="link_txt"> ثبت شکایات</span></a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div><?php }
}
