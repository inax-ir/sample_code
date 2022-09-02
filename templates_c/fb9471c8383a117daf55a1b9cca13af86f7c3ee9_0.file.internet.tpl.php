<?php
/* Smarty version 4.2.0, created on 2022-09-02 13:28:58
  from 'D:\xampp\htdocs\GitHub\inax\sample_code\templates\internet.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6311c5d29c7de6_45050683',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb9471c8383a117daf55a1b9cca13af86f7c3ee9' => 
    array (
      0 => 'D:\\xampp\\htdocs\\GitHub\\inax\\sample_code\\templates\\internet.tpl',
      1 => 1662108418,
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
function content_6311c5d29c7de6_45050683 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">

            <?php if ((isset($_smarty_tpl->tpl_vars['mobile_verification_required']->value)) || ((isset($_smarty_tpl->tpl_vars['select_operator']->value)) && !(isset($_smarty_tpl->tpl_vars['internet_result']->value)))) {?>
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-sitemap fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 <?php if ((isset($_smarty_tpl->tpl_vars['logged_in']->value)) && $_smarty_tpl->tpl_vars['logged_in']->value) {?><a class="btn btn-primary btn-xs btn-left" href="./internet.php?action=list"><i class="fa fa-database fa-fw"></i> گزارش خرید بسته های اینترنتی</a><?php }?></div>
                    <div class="panel-body">

                        <?php if ((isset($_smarty_tpl->tpl_vars['disabed']->value))) {?>
                            <div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['disabed']->value;?>
</div>
                        <?php } elseif ((isset($_smarty_tpl->tpl_vars['mobile_verification_required']->value)) && $_smarty_tpl->tpl_vars['mobile_verification_required']->value) {?>
                            <div class="alert alert-danger ">لطفا ابتدا با کلیک بر روی <a href="clients.php?action=mobile">اینجا</a> شماره تلفن همراه خود را تائید نمائید.</div>
                        <?php } else { ?>
                            <div class="alert alert-info">لطفا از بخش زیر، اپراتور تلفن همراهی که قصد خرید بسته اینترنت برای آن را دارید انتخاب نمائید</div>

                            <div class="col-lg-4 col-md-5 text-center">
                                <div class="panel panel-default">
                                    <a href="internet.php?MTN">
                                        <div class="panel-footer" >
                                            <span class="text-center"><img src="templates/images/mtn_internet.png" /></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5 text-center">
                                <div class="panel panel-default">
                                    <a href="internet.php?MCI">
                                        <div class="panel-footer" >
                                            <span class="text-center"><img src="templates/images/mci_internet.png" /></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5 text-center">
                                <div class="panel panel-default">
                                    <a href="internet.php?RTL">
                                        <div class="panel-footer" >
                                            <span class="text-center"><img src="templates/images/rtl_internet.png" /></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>
            <?php }?>

            <?php if ((isset($_smarty_tpl->tpl_vars['request_sim_type']->value)) && $_smarty_tpl->tpl_vars['request_sim_type']->value) {?>
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-sitemap fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 <?php if ((isset($_smarty_tpl->tpl_vars['logged_in']->value)) && $_smarty_tpl->tpl_vars['logged_in']->value) {?><a class="btn btn-primary btn-xs btn-left" href="./internet.php?action=list"><i class="fa fa-database fa-fw"></i> گزارش خرید بسته های اینترنتی</a><?php }?></div>
                    <div class="panel-body">

                        <div class="alert alert-info">لطفا نوع سیم کارت تلفن همراهی که قصد خرید بسته اینترنت برای آن را دارید انتخاب نمائید:</div>

                        <div class="col-lg-6 col-md-6 text-center">
                            <div class="panel panel-default">
                                <a href="internet.php?<?php echo $_smarty_tpl->tpl_vars['operator']->value;?>
&s=credit">
                                    <div class="panel-footer" >
                                        <span class="text-center"><img src="templates/images/sim_type_credit.jpg" /></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 text-center">
                            <div class="panel panel-default">
                                <a href="internet.php?<?php echo $_smarty_tpl->tpl_vars['operator']->value;?>
&s=permanent">
                                    <div class="panel-footer" >
                                        <span class="text-center"><img src="templates/images/sim_type_permanent.jpg" /></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>

            <?php if ((isset($_smarty_tpl->tpl_vars['package_list']->value)) && $_smarty_tpl->tpl_vars['package_list']->value) {?>
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-sitemap fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 <?php if ((isset($_smarty_tpl->tpl_vars['logged_in']->value)) && $_smarty_tpl->tpl_vars['logged_in']->value) {?><a class="btn btn-primary btn-xs btn-left" href="./internet.php?action=list"><i class="fa fa-database fa-fw"></i> گزارش خرید بسته های اینترنتی</a><?php }?></div>
                    <div class="panel-body">

                        <?php if ((isset($_smarty_tpl->tpl_vars['success_msg']->value))) {?><div class="alert alert-success"><?php echo $_smarty_tpl->tpl_vars['success_msg']->value;?>
</div><?php }?>
                        <?php if ((isset($_smarty_tpl->tpl_vars['error_msg']->value))) {?><div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
</div><?php }?>

                        <?php if (!(isset($_smarty_tpl->tpl_vars['error_msg']->value))) {?>
                            <div class="alert alert-info">لطفا نوع بسته اینترنت را انتخاب نمائید</div>

                            <?php if ((isset($_smarty_tpl->tpl_vars['have_package']->value))) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['have_package']->value, 'link', false, 'key');
$_smarty_tpl->tpl_vars['link']->index = -1;
$_smarty_tpl->tpl_vars['link']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['link']->value) {
$_smarty_tpl->tpl_vars['link']->do_else = false;
$_smarty_tpl->tpl_vars['link']->index++;
$_smarty_tpl->tpl_vars['link']->first = !$_smarty_tpl->tpl_vars['link']->index;
$__foreach_link_0_saved = $_smarty_tpl->tpl_vars['link'];
?>

                                    <div class="panel-group" id="accordion">
                                        <div class="panel panel-warning service_status">
                                            <a class="<?php if ($_smarty_tpl->tpl_vars['link']->first) {
} else { ?>collapsed<?php }?>" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $_smarty_tpl->tpl_vars['link']->value['type_en'];?>
">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title" style="font-size: 13px !important;">
                                                        <i class="fa fa-leaf fa-fw" style="vertical-align: -3px;font-size: 16px;"></i> <?php echo $_smarty_tpl->tpl_vars['link']->value['type_fa'];?>
 <i class="fa fa-chevron-down fa-fw" style="float:left;"></i>
                                                    </h4>
                                                </div>
                                            </a>
                                            <div id="collapse_<?php echo $_smarty_tpl->tpl_vars['link']->value['type_en'];?>
" style="<?php if ($_smarty_tpl->tpl_vars['link']->first) {
} else { ?>height:0px;<?php }?>" class="panel-collapse collapse <?php if ($_smarty_tpl->tpl_vars['link']->first) {?>in<?php }?>" style="height: 0px;">
                                                <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered table-hover listtable" style="border-collapse: separate;border:1px solid #BCBCBC;border-radius:7px !important;">
                                                            <thead>
                                                            <tr>
                                                                <td colspan="3" class="text-right fa_num">تعداد بسته های موجود <?php echo count($_smarty_tpl->tpl_vars['link']->value['lists2']);?>
 </span></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="ths" >ردیف</th>
                                                                <th class="ths" >نام بسته</th>
                                                                <th class="ths">قیمت</th>
                                                                <th class="ths">دکمه خرید</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <?php if ((isset($_smarty_tpl->tpl_vars['link']->value['lists2']))) {?>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['link']->value['lists2'], 'link2', false, 'key2');
$_smarty_tpl->tpl_vars['link2']->iteration = 0;
$_smarty_tpl->tpl_vars['link2']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['link2']->key => $_smarty_tpl->tpl_vars['link2']->value) {
$_smarty_tpl->tpl_vars['link2']->do_else = false;
$_smarty_tpl->tpl_vars['key2']->value = $_smarty_tpl->tpl_vars['link2']->key;
$_smarty_tpl->tpl_vars['link2']->iteration++;
$__foreach_link2_1_saved = $_smarty_tpl->tpl_vars['link2'];
?>

                                                                                                                                                                                                            
                                                                    <tr>
                                                                        <td class="text-center fa_num" style="padding: 13px 3px 11px 3px !important;">  <?php echo $_smarty_tpl->tpl_vars['link2']->iteration;?>
</td>
                                                                        <td class="text-center fa_num" style="padding: 13px 3px 11px 3px !important;">  <?php echo $_smarty_tpl->tpl_vars['link2']->value['name'];?>
</td>
                                                                        <td class="text-center fa_num text-warning" style="padding: 13px 3px 11px 3px !important;"> <?php echo number_format($_smarty_tpl->tpl_vars['link2']->value['amount']);?>
 تومان</td>
                                                                        <td class="text-center fa_num" style="padding: 13px 3px 11px 3px !important;"><a href="internet.php?<?php echo $_smarty_tpl->tpl_vars['operator']->value;?>
&s=<?php echo $_smarty_tpl->tpl_vars['sim_type']->value;?>
&i=<?php echo $_smarty_tpl->tpl_vars['link']->value['type_en'];?>
&pid=<?php echo $_smarty_tpl->tpl_vars['link2']->value['id'];?>
" style="color:white;" class="btn btn-warning btn-sm" >خرید آنلاین</a></td>
                                                                    </tr>
                                                                <?php
$_smarty_tpl->tpl_vars['link2'] = $__foreach_link2_1_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                            <?php } else { ?>
                                                                <tr>
                                                                    <td colspan="3" class="text-center">بسته ای یافت نشد</td>
                                                                </tr>
                                                            <?php }?>


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="clear:both"></div>
                                        </div>
                                    </div>
                                <?php
$_smarty_tpl->tpl_vars['link'] = $__foreach_link_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php }?>
                        <?php }?>

                    </div>
                </div>
            <?php }?>

            <?php if ((isset($_smarty_tpl->tpl_vars['enter_mobile']->value))) {?>
                <div class="panel panel-<?php if ($_smarty_tpl->tpl_vars['operator']->value == 'MTN') {?>yellow<?php } elseif ($_smarty_tpl->tpl_vars['operator']->value == 'MCI') {?>primary<?php } elseif ($_smarty_tpl->tpl_vars['operator']->value == 'RTL') {?>danger<?php }?>">
                    <div class="panel-heading"><i class="fa fa-sitemap fa-fw"></i> خرید بسته اینترنت <?php if ($_smarty_tpl->tpl_vars['operator']->value == 'MTN') {?>ایرانسل<?php } elseif ($_smarty_tpl->tpl_vars['operator']->value == 'MCI') {?>همراه اول<?php } elseif ($_smarty_tpl->tpl_vars['operator']->value == 'RTL') {?>رایتل<?php }?> <?php if ((isset($_smarty_tpl->tpl_vars['logged_in']->value)) && $_smarty_tpl->tpl_vars['logged_in']->value) {?><a class="btn btn-default btn-xs btn-left" href="./internet.php?action=list"><i class="fa fa-database fa-fw"></i> گزارش خرید بسته های اینترنتی</a><?php }?></div>
                    <div class="panel-body">

                        <?php if ((isset($_smarty_tpl->tpl_vars['pay_code']->value))) {?>
                            <?php echo '<script'; ?>
 src="assets/js/clients/fakeLoader.js"><?php echo '</script'; ?>
>
                            <link href="assets/css/clients/fakeLoader.css" rel="stylesheet">

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

                        <?php if ((isset($_smarty_tpl->tpl_vars['error_msg']->value))) {?><div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
</div><?php }?>

                        <?php if ((isset($_smarty_tpl->tpl_vars['product_find']->value))) {?>
                            <div class="alert alert-info">لطفا در فیلد زیر شماره تلفنی که قصد دارید بسته اینترنتی را برای آن خریداری نمائید را وارد کنید:</div>
                            <div class="table-responsive">

                                <form action="internet.php?<?php echo $_smarty_tpl->tpl_vars['operator']->value;?>
&s=<?php echo $_smarty_tpl->tpl_vars['sim_type']->value;?>
&i=<?php echo $_smarty_tpl->tpl_vars['internet_type']->value;?>
&pid=<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
" method="POST" >
                                    <table class="table table-striped table-hover text-center" >
                                        <tr>
                                            <td></td>
                                            <td>
                                                خرید بسته <?php echo $_smarty_tpl->tpl_vars['product_name']->value;?>

                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                مبلغ بسته <?php echo number_format($_smarty_tpl->tpl_vars['product_amount']->value);?>
 تومان
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="form-group has-warning input-group">
                                                    <input type="text" maxlength="11" placeholder="شماره تلفن همراه" dir="ltr" class="form-control" autocomplete="off" name="mobile" value="<?php if ((isset($_POST['mobile']))) {
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
                                            <td></td>
                                            <td>
                                                 <input type="checkbox" name="mnp" value="1" id="mnp_label"> <label for="mnp_label"> در صورتی که شماره فوق به اپراتور انتخاب شده، ترابرد شده است این گزینه را فعال نمائید.</label>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><button class="btn btn-success form-control" name="submit" type="submit"><i class="fa fa-check"></i> پرداخت و فعالسازی بسته اینترنتی</button></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        <?php }?>
                        <?php }?>
                    </div>
                </div>
            <?php }?>

        </div>
    </div>
</div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
