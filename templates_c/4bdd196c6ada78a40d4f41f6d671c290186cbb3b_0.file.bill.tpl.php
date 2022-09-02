<?php
/* Smarty version 4.2.0, created on 2022-09-02 13:25:48
  from 'D:\xampp\htdocs\GitHub\inax\sample_code\templates\bill.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6311c514e05ed8_03971756',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4bdd196c6ada78a40d4f41f6d671c290186cbb3b' => 
    array (
      0 => 'D:\\xampp\\htdocs\\GitHub\\inax\\sample_code\\templates\\bill.tpl',
      1 => 1662108783,
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
function content_6311c514e05ed8_03971756 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div id="page-wrapper">
    <div class="spacer"></div>

    <div class="row">
        <div class="col-lg-12">

            <?php if ((isset($_smarty_tpl->tpl_vars['bill_active']->value)) && $_smarty_tpl->tpl_vars['bill_active']->value) {?>
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-sitemap fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</div>
                    <div class="panel-body">

                        <div class="alert alert-info">- توسط این بخش می توانید نسبت به پرداخت قبوض آب، برق، گاز، تلفن همراه، تلفن ثابت ثابت، عوارض شهرداری، سازمان مالیات و جریمه راهنمایی و رانندگی اقدام کنید..</div>

                        <?php if ((isset($_smarty_tpl->tpl_vars['error_msg']->value))) {?>
                            <div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
</div><?php }?>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <tr>
                                    <th>شناسه قبض</th>
                                    <td>
                                        <input type="tel" name="bill_id" dir="auto" id="bill_id" maxlength="20" class="myform-control" value="<?php if ((isset($_POST['bill_id']))) {
echo $_POST['bill_id'];
}?>" size="35" tabindex="1" required/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>شناسه پرداخت</th>
                                    <td>
                                        <input type="tel" name="pay_id" dir="auto" id="pay_id" maxlength="20" class="myform-control" value="<?php if ((isset($_POST['pay_id']))) {
echo $_POST['pay_id'];
}?>" size="35" tabindex="2" required/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>موبایل</th>
                                    <td>
                                        <input type="tel" name="mobile" dir="ltr" id="mobile" maxlength="11" class="myform-control" value="<?php if ((isset($_POST['mobile']))) {
echo $_POST['mobile'];
}?>" size="35" tabindex="3" required/>
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <button class="btn btn-primary btn-sm" type="button" onclick="check_bill();return false;" tabindex="4">
                                            <i class="fa fa-check"></i> بررسی اطلاعات
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        
                            <?php echo '<script'; ?>
>
                                function check_bill() {
                                    var bill_id = jQuery('#bill_id').val();
                                    var pay_id = jQuery('#pay_id').val();
                                    var mobile = jQuery('#mobile').val();
                                    $('#myModal').modal('show');
                                    $('#modal_result').fadeOut(1);
                                    $('#modal_loading').fadeIn(200);
                                    $.ajax({
                                        type: "POST",
                                        url: "bill.php?check_bill",
                                        data: {bill_id: bill_id, pay_id: pay_id, mobile: mobile},
                                        dataType: "text",
                                        success: function (msg) {
                                            obj = JSON.parse(msg);
                                            if (obj.error_msg == 'no') {
                                                $('.display_bill_type').html(obj.type);
                                                $('.display_bill_amount').html(obj.amount + ' ریال');
                                                $('.display_pay_type').html(obj.pay_type);
                                                $('.display_error_msg').html('');
                                                $("#tr1,#tr2,#tr3,#tr5").show();
                                                $("#error").hide();
                                            } else {
                                                $('.display_bill_type,.display_bill_amount,.display_pay_type').html('تعریف نشده');
                                                $('.display_error_msg').html(obj.error_msg);
                                                $("#error").show();
                                                $("#tr1,#tr2,#tr3,#tr5").hide();
                                            }

                                            $('#modal_loading').fadeOut(300);
                                            $('#modal_result').delay(300).fadeIn(500);
                                        }
                                    });
                                }
                            <?php echo '</script'; ?>
>
                        
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">بررسی اطلاعات</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <div id="modal_loading" style="text-align:center;padding:20px 0px 20px 0px;">
                                                در حال بررسی اطلاعات ...<br/>
                                                <img src="templates/images/loading.gif"/>
                                            </div>
                                            <table id="modal_result" class="table table-bordered " style="display:none;">
                                                <tr id="tr1" style="display:none">
                                                    <th class="myth">نوع قبض</th>
                                                    <td><span class="display_bill_type"></span>
                                                    </td>
                                                </tr>
                                                <tr id="tr2" style="display:none">
                                                    <th class="myth">مبلغ</th>
                                                    <td><span class="display_bill_amount"></span></td>
                                                </tr>
                                                <tr id="tr5" style="display:none">
                                                    <th class="myth">نحوه پرداخت</th>
                                                    <td><span class="display_pay_type"></span></td>
                                                </tr>
                                                <tr id="error" style="display:none">
                                                    <th class="myth"> خطا</th>
                                                    <td><span class="display_error_msg"></span></td>
                                                </tr>
                                                <tr id="tr3" style="display:none">
                                                    <th class="myth"></th>
                                                    <td>
                                                        <form action="bill.php" method="POST">
                                                            <button class="btn btn-success btn-sm" name="pay_submit" type="submit">
                                                                <i class="fa fa-check"></i> پرداخت
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
