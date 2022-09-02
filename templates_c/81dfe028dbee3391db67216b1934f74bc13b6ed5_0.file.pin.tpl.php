<?php
/* Smarty version 4.2.0, created on 2022-09-02 13:28:37
  from 'D:\xampp\htdocs\GitHub\inax\sample_code\templates\pin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6311c5bd110183_36268769',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '81dfe028dbee3391db67216b1934f74bc13b6ed5' => 
    array (
      0 => 'D:\\xampp\\htdocs\\GitHub\\inax\\sample_code\\templates\\pin.tpl',
      1 => 1662108389,
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
function content_6311c5bd110183_36268769 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div id="page-wrapper">
    <div class="spacer"></div>

    <div class="row">
        <div class="col-lg-12">

            <?php if ((isset($_smarty_tpl->tpl_vars['buy_charge']->value)) && !(isset($_smarty_tpl->tpl_vars['mtn_active']->value)) && !(isset($_smarty_tpl->tpl_vars['mci_active']->value)) && !(isset($_smarty_tpl->tpl_vars['rtl_active']->value)) && !(isset($_smarty_tpl->tpl_vars['bill_active']->value)) && !(isset($_smarty_tpl->tpl_vars['pin_result']->value))) {?>
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-sitemap fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 </div>
                    <div class="panel-body">

                        <div class="alert alert-info">برای خرید کارت شارژ ، لطفا از بخش زیر نسبت به انتخاب اپراتور اقدام نمائید.</div>

                        <div class="col-lg-4 col-md-5 text-center">
                            <div class="panel panel-default">
                                <a href="pin.php?MTN">
                                    <div class="panel-footer">
                                        <span class="text-center"><img src="templates/images/mtn.png"/></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 text-center">
                            <div class="panel panel-default">
                                <a href="pin.php?MCI">
                                    <div class="panel-footer">
                                        <span class="text-center"><img src="templates/images/mci.png"/></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 text-center">
                            <div class="panel panel-default">
                                <a href="pin.php?RTL">
                                    <div class="panel-footer">
                                        <span class="text-center"><img src="templates/images/rtl.png"/></span>
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
                    <div class="panel-heading">
                        <i class="fa fa-sitemap fa-fw"></i> خرید شارژ اعتباری <?php if ((isset($_smarty_tpl->tpl_vars['mtn_active']->value))) {?>ایرانسل<?php } elseif ((isset($_smarty_tpl->tpl_vars['mci_active']->value))) {?>همراه اول<?php } elseif ((isset($_smarty_tpl->tpl_vars['rtl_active']->value))) {?>رایتل<?php }?>
                    </div>
                    <div class="panel-body">

                        <?php if ((isset($_smarty_tpl->tpl_vars['pay_code']->value))) {?>
                            <?php echo '<script'; ?>
 src="../assets/js/clients/fakeLoader.js"><?php echo '</script'; ?>
>
                            <link href="../assets/css/clients/fakeLoader.css" rel="stylesheet">
                            <style>
                                .dot1 {
                                <?php if ($_smarty_tpl->tpl_vars['gateway']->value == 'mellat' || $_smarty_tpl->tpl_vars['gateway']->value == 'city') {?> background-color: #ee4a52 !important;
                                <?php } elseif ($_smarty_tpl->tpl_vars['gateway']->value == 'saman' || $_smarty_tpl->tpl_vars['gateway']->value == 'parsian') {?> background-color: #6ea8ff !important;
                                <?php } elseif ($_smarty_tpl->tpl_vars['gateway']->value == 'pasargad') {?> background-color: #efc316 !important;
                                <?php } elseif ($_smarty_tpl->tpl_vars['gateway']->value == 'melli') {?> background-color: #a1dd8d !important;
                                <?php }?>
                                }

                                .dot2 {
                                <?php if ($_smarty_tpl->tpl_vars['gateway']->value == 'mellat' || $_smarty_tpl->tpl_vars['gateway']->value == 'city') {?> background-color: #c92f37 !important;
                                <?php } elseif ($_smarty_tpl->tpl_vars['gateway']->value == 'saman' || $_smarty_tpl->tpl_vars['gateway']->value == 'parsian') {?> background-color: #428bca !important;
                                <?php } elseif ($_smarty_tpl->tpl_vars['gateway']->value == 'pasargad') {?> background-color: #efc316 !important;
                                <?php } elseif ($_smarty_tpl->tpl_vars['gateway']->value == 'melli') {?> background-color: #7fba6b !important;
                                <?php }?>
                                }
                            </style>
                            <div class="fakeloader"></div>
                            <?php echo '<script'; ?>
>
                                $(document).ready(function () {
                                    $(".fakeloader").fakeLoader({
                                        spinner: "spinner3"
                                    });
                                });
                            <?php echo '</script'; ?>
>
                            <?php echo $_smarty_tpl->tpl_vars['pay_code']->value;?>

                        <?php } else { ?>
                            <div class="alert alert-info">لطفا از بخش زیر شماره تلفن و مبلغ شارژ را وارد نمائید</div>
                        <?php if ((isset($_smarty_tpl->tpl_vars['error_msg']->value))) {?>
                            <div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
</div><?php }?>
                            <div class="table-responsive">

                                <form action="pin.php?<?php if ((isset($_smarty_tpl->tpl_vars['mtn_active']->value))) {?>MTN<?php } elseif ((isset($_smarty_tpl->tpl_vars['mci_active']->value))) {?>MCI<?php } elseif ((isset($_smarty_tpl->tpl_vars['rtl_active']->value))) {?>RTL<?php }?>" id="buy_form" method="POST">
                                    <table class="table table-striped table-hover text-center">
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="form-group has-warning input-group">
                                                    <input type="text" maxlength="11" placeholder="شماره تلفن همراه" dir="ltr" id="mobile" class="form-control" name="mobile" value="<?php if ((isset($_POST['mobile']))) {
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
                                            <td>
                                                <input type="radio" name="amount" value="1000" id="1000" tabindex="2" <?php if ((isset($_POST['amount'])) && $_POST['amount'] == '1000') {?>checked<?php }?> required/>
                                                <label for="1000"> شارژ <?php if ((isset($_smarty_tpl->tpl_vars['mtn_active']->value))) {?>ایرانسل<?php } elseif ((isset($_smarty_tpl->tpl_vars['mci_active']->value))) {?>همراه اول<?php } elseif ((isset($_smarty_tpl->tpl_vars['rtl_active']->value))) {?>رایتل<?php }?>
                                                    <span class="fa_num">1,000</span> تومانی</label></td>
                                            <td>
                                                <input type="radio" name="amount" value="2000" id="2000" tabindex="2" <?php if ((isset($_POST['amount'])) && $_POST['amount'] == '2000') {?>checked<?php }?> required/>
                                                <label for="2000"> شارژ <?php if ((isset($_smarty_tpl->tpl_vars['mtn_active']->value))) {?>ایرانسل<?php } elseif ((isset($_smarty_tpl->tpl_vars['mci_active']->value))) {?>همراه اول<?php } elseif ((isset($_smarty_tpl->tpl_vars['rtl_active']->value))) {?>رایتل<?php }?>
                                                    <span class="fa_num">2,000</span> تومانی</label></td>
                                            <td>
                                                <input type="radio" name="amount" value="5000" id="5000" tabindex="2" <?php if ((isset($_POST['amount'])) && $_POST['amount'] == '5000') {?>checked<?php }?> required/>
                                                <label for="5000"> شارژ <?php if ((isset($_smarty_tpl->tpl_vars['mtn_active']->value))) {?>ایرانسل<?php } elseif ((isset($_smarty_tpl->tpl_vars['mci_active']->value))) {?>همراه اول<?php } elseif ((isset($_smarty_tpl->tpl_vars['rtl_active']->value))) {?>رایتل<?php }?>
                                                    <span class="fa_num">5,000</span> تومانی</label></td>
                                        </tr>
                                        <tr>

                                            <td>
                                                <input type="radio" name="amount" value="10000" id="10000" tabindex="2" <?php if ((isset($_POST['amount'])) && $_POST['amount'] == '10000') {?>checked<?php }?> required/>
                                                <label for="10000"> شارژ <?php if ((isset($_smarty_tpl->tpl_vars['mtn_active']->value))) {?>ایرانسل<?php } elseif ((isset($_smarty_tpl->tpl_vars['mci_active']->value))) {?>همراه اول<?php } elseif ((isset($_smarty_tpl->tpl_vars['rtl_active']->value))) {?>رایتل<?php }?>
                                                    <span class="fa_num">10,000</span> تومانی</label></td>
                                            <td>
                                                <input type="radio" name="amount" value="20000" id="20000" tabindex="2" <?php if ((isset($_POST['amount'])) && $_POST['amount'] == '20000') {?>checked<?php }?> required/>
                                                <label for="20000"> شارژ <?php if ((isset($_smarty_tpl->tpl_vars['mtn_active']->value))) {?>ایرانسل<?php } elseif ((isset($_smarty_tpl->tpl_vars['mci_active']->value))) {?>همراه اول<?php } elseif ((isset($_smarty_tpl->tpl_vars['rtl_active']->value))) {?>رایتل<?php }?>
                                                    <span class="fa_num">20,000</span> تومانی</label></td>
                                            <td></td>
                                        </tr>
                                        <!--<tr>
									<td></td>
									<td>
										<div class="form-group has-warning input-group">
											<input type="number" maxlength="3" min="1" max="200" placeholder="تعداد کارت شارژ" dir="ltr" id="count" class="form-control" name="count" value="<?php if ((isset($_POST['count']))) {
echo $_POST['count'];
} elseif ((isset($_smarty_tpl->tpl_vars['count']->value))) {
echo $_smarty_tpl->tpl_vars['count']->value;
} else { ?>1<?php }?>" tabindex="3" required/>
											<span class="input-group-addon"><i class="fa fa-plus-square fa-fw fa-1x"></i></span>
										</div>
									</td>
									<td></td>
								</tr>-->
                                        <tr>
                                            <td></td>
                                            <td>
                                                <!--<button class="btn btn-success form-control" name="submit" tabindex="4" type="submit"><i class="fa fa-check"></i> خرید کارت شارژ</button></td>-->
                                                <input name="btnSubmit" style="display:none;" type="hidden"/>
                                                <a class="btn btn-warning" data-toggle="collapse" data-parent="#accordion" onclick="display_invoice()" href="#collapseTwo" style="color:white;"><i class="fa fa-edit"></i> صدور فاکتور پرداخت</a>
                                            </td>
                                        </tr>
                                    </table>
                                </form>

                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-info service_status">

                                        <div style="<?php if ((isset($_POST['submit']))) {
} else { ?>height:0px;<?php }?>" id="collapseTwo" class="panel-collapse collapse <?php if ((isset($_POST['submit']))) {?>in<?php }?>">
                                            <div class="panel-body">

                                                <table class="table table-striped table-bordered ">
                                                    <tr>
                                                        <td>شماره موبایل</td>
                                                        <td><span id="invoice_mobile"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>مبلغ شارژ</td>
                                                        <td><span id="invoice_amount"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>تعداد</td>
                                                        <td><span id="invoice_count"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>پرداخت</td>
                                                        <td>
                                                            <button class="btn btn-success form-control" id="submit_btn" href="#" style="color:white;">
                                                                <i class="fa fa-check"></i> پرداخت و شارژ مستقیم سیم کارت
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </table>


                                                <?php echo '<script'; ?>
>
                                                    function display_invoice() {
                                                        var mobile = $('#mobile').get(0).value;
                                                        $('#invoice_mobile').html(mobile);

                                                        /*
                                                        var amount = $("input[name='amount']:checked"). text();
                                                        if(amount){
                                                            $('#invoice_amount').html(amount);
                                                        }*/

                                                        $("input[type='radio']:checked").each(function () {
                                                            var idVal = $(this).attr("id");
                                                            var amount = $("label[for='" + idVal + "']").text();
                                                            $('#invoice_amount').html(amount);
                                                        });

                                                        var count = $('#count').get(0).value;
                                                        $('#invoice_count').html(count);
                                                    }

                                                    //حین تغییر در مقدار موبایل
                                                    $("#mobile").keydown(keyPress);

                                                    function keyPress(e) {
                                                        if ($('#collapseTwo').hasClass('in') === true) {
                                                            $('#collapseTwo').collapse('hide');
                                                        }
                                                    }

                                                    //حین تغییر در مبلغ
                                                    $("input[name='amount']").change(function () {
                                                        //var val = $("input[type='radio'][name='floors']:checked").val();
                                                        //alert(val);
                                                        if ($('#collapseTwo').hasClass('in') === true) {
                                                            $('#collapseTwo').collapse('hide');
                                                        }
                                                    });

                                                    //حین تغییر در مقدار نوع شارژ
                                                    $("#count").change(function () {
                                                        if ($('#collapseTwo').hasClass('in') === true) {
                                                            $('#collapseTwo').collapse('hide');
                                                        }
                                                    });

                                                    function hide_invoice() {
                                                        if ($('#collapseTwo').hasClass('in') === true) {
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

        </div>
    </div>
</div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
