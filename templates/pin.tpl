{include file="header.tpl"}
{include file="sidebar.tpl"}
<div id="page-wrapper">
    <div class="spacer"></div>

    <div class="row">
        <div class="col-lg-12">

            {if isset($buy_charge) && !isset($mtn_active)  && !isset($mci_active) && !isset($rtl_active) && !isset($bill_active) && !isset($pin_result) }
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-sitemap fa-fw"></i> {$title} </div>
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
            {/if}


            {if isset($mtn_active)  || isset($mci_active) || isset($rtl_active) }
                <div class="panel panel-{if isset($mtn_active) }yellow{elseif isset($mci_active)}primary{elseif isset($rtl_active)}danger{/if}">
                    <div class="panel-heading">
                        <i class="fa fa-sitemap fa-fw"></i> خرید شارژ اعتباری {if isset($mtn_active) }ایرانسل{elseif isset($mci_active)}همراه اول{elseif isset($rtl_active)}رایتل{/if}
                    </div>
                    <div class="panel-body">

                        {if isset($pay_code)}
                            <script src="../assets/js/clients/fakeLoader.js"></script>
                            <link href="../assets/css/clients/fakeLoader.css" rel="stylesheet">
                            <style>
                                .dot1 {
                                {if $gateway eq 'mellat' || $gateway eq 'city'} background-color: #ee4a52 !important;
                                {elseif $gateway eq 'saman' || $gateway eq 'parsian'} background-color: #6ea8ff !important;
                                {elseif $gateway eq 'pasargad'} background-color: #efc316 !important;
                                {elseif $gateway eq 'melli'} background-color: #a1dd8d !important;
                                {/if}
                                }

                                .dot2 {
                                {if $gateway eq 'mellat' || $gateway eq 'city'} background-color: #c92f37 !important;
                                {elseif $gateway eq 'saman' || $gateway eq 'parsian'} background-color: #428bca !important;
                                {elseif $gateway eq 'pasargad'} background-color: #efc316 !important;
                                {elseif $gateway eq 'melli'} background-color: #7fba6b !important;
                                {/if}
                                }
                            </style>
                            <div class="fakeloader"></div>
                            <script>
                                $(document).ready(function () {
                                    $(".fakeloader").fakeLoader({
                                        spinner: "spinner3"
                                    });
                                });
                            </script>
                            {$pay_code}
                        {else}
                            <div class="alert alert-info">لطفا از بخش زیر شماره تلفن و مبلغ شارژ را وارد نمائید</div>
                        {if isset($error_msg) }
                            <div class="alert alert-danger">{$error_msg}</div>{/if}
                            <div class="table-responsive">

                                <form action="pin.php?{if isset($mtn_active) }MTN{elseif isset($mci_active)}MCI{elseif isset($rtl_active)}RTL{/if}" id="buy_form" method="POST">
                                    <table class="table table-striped table-hover text-center">
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="form-group has-warning input-group">
                                                    <input type="text" maxlength="11" placeholder="شماره تلفن همراه" dir="ltr" id="mobile" class="form-control" name="mobile" value="{if isset($smarty.post.mobile)}{$smarty.post.mobile}{elseif isset($mobile)}{$mobile}{else}{/if}" tabindex="1" required/>
                                                    <span class="input-group-addon"><i class="fa fa-phone fa-fw fa-1x"></i></span>
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="radio" name="amount" value="1000" id="1000" tabindex="2" {if isset($smarty.post.amount) && $smarty.post.amount eq '1000' }checked{/if} required/>
                                                <label for="1000"> شارژ {if isset($mtn_active) }ایرانسل{elseif isset($mci_active)}همراه اول{elseif isset($rtl_active)}رایتل{/if}
                                                    <span class="fa_num">1,000</span> تومانی</label></td>
                                            <td>
                                                <input type="radio" name="amount" value="2000" id="2000" tabindex="2" {if isset($smarty.post.amount) && $smarty.post.amount eq '2000' }checked{/if} required/>
                                                <label for="2000"> شارژ {if isset($mtn_active) }ایرانسل{elseif isset($mci_active)}همراه اول{elseif isset($rtl_active)}رایتل{/if}
                                                    <span class="fa_num">2,000</span> تومانی</label></td>
                                            <td>
                                                <input type="radio" name="amount" value="5000" id="5000" tabindex="2" {if isset($smarty.post.amount) && $smarty.post.amount eq '5000' }checked{/if} required/>
                                                <label for="5000"> شارژ {if isset($mtn_active) }ایرانسل{elseif isset($mci_active)}همراه اول{elseif isset($rtl_active)}رایتل{/if}
                                                    <span class="fa_num">5,000</span> تومانی</label></td>
                                        </tr>
                                        <tr>

                                            <td>
                                                <input type="radio" name="amount" value="10000" id="10000" tabindex="2" {if isset($smarty.post.amount) && $smarty.post.amount eq '10000' }checked{/if} required/>
                                                <label for="10000"> شارژ {if isset($mtn_active) }ایرانسل{elseif isset($mci_active)}همراه اول{elseif isset($rtl_active)}رایتل{/if}
                                                    <span class="fa_num">10,000</span> تومانی</label></td>
                                            <td>
                                                <input type="radio" name="amount" value="20000" id="20000" tabindex="2" {if isset($smarty.post.amount) && $smarty.post.amount eq '20000' }checked{/if} required/>
                                                <label for="20000"> شارژ {if isset($mtn_active) }ایرانسل{elseif isset($mci_active)}همراه اول{elseif isset($rtl_active)}رایتل{/if}
                                                    <span class="fa_num">20,000</span> تومانی</label></td>
                                            <td></td>
                                        </tr>
                                        <!--<tr>
									<td></td>
									<td>
										<div class="form-group has-warning input-group">
											<input type="number" maxlength="3" min="1" max="200" placeholder="تعداد کارت شارژ" dir="ltr" id="count" class="form-control" name="count" value="{if isset($smarty.post.count)}{$smarty.post.count}{elseif isset($count)}{$count}{else}1{/if}" tabindex="3" required/>
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

                                        <div style="{if isset($smarty.post.submit) }{else}height:0px;{/if}" id="collapseTwo" class="panel-collapse collapse {if isset($smarty.post.submit) }in{/if}">
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


                                                <script>
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

                                                        //var count = $('#count').get(0).value;
                                                        var count = 1;
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

                                                </script>
                                            </div>
                                        </div>
                                        <div style="clear:both"></div>
                                    </div>
                                </div>

                            </div>
                        {/if}
                    </div>
                </div>
            {/if}

        </div>
    </div>
</div>
</div>

{include file="footer.tpl"}