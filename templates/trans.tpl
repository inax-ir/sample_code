{include file="header.tpl"}
{include file="sidebar.tpl"} 
<div id="page-wrapper">
	<div class="spacer"></div>

	<div class="row">
		<div class="col-lg-12">

			<div class="panel panel-yellow">	
				<div class="panel-heading"><i class="fa fa-sitemap fa-fw"></i> تراکنش ها</div>
				<div class="panel-body">

					{if isset($success_msg) }<div class="alert alert-success">{$success_msg}</div>{/if}
					{if isset($error_msg) }<div class="alert alert-danger">{$error_msg}</div>{/if}
					
					{if isset($trans_result) }
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" >
						{if isset($trans_result)}
						{foreach from=$trans_result key=key item=link}
							<tr><th style="width:20%">شناسه تراکنش</th><td>{$link.id}</td></tr>
							<tr><th>مبلغ تراکنش</th><td>{$link.amount|number_format} تومان</td></tr>
							{if $link.ref_code neq ''}<th>شماره پیگیری</th><td>{$link.ref_code}</td></tr>{/if}
							<tr><th>شماره سفارش</th><td>{$link.order_id}</td></tr>
							
							{if $link.product eq 'pin' && isset($link.buyed_output) }
							<tr>
								<th>اطلاعات خرید</th>
								<td>{$link.buyed_output}</td>
							</tr>
							{/if}

							{if $link.product eq 'bill' }
							<tr>
								<th width="200px">شناسه قبض</th>
								<td>{$link.bill_id}</td>
							</tr>
							<tr>
								<th width="200px">شناسه پرداخت</th>
								<td>{$link.pay_id}</td>
							</tr>
							<tr>
								<th>نوع قبض</th>
								<td>{$link.bill_type|bill_type}</td>
							</tr>
							<tr>
								<th width="200px">موبایل</th>
								<td>{$link.mobile}</td>
							</tr>
							{if $link.status eq 'paid'}
							<tr>
								<th>تاریخ پرداخت</th>
								<td>{$link.pay_date|jdate_format}</td>
							</tr>
							{/if}
							{/if}

							<tr><th>نتیجه</th><td>{if $link.status eq 'paid'}<span class="label label-success">پرداخت شده</span>{elseif $link.status eq 'unpaid'}<span class="label label-danger">پرداخت نشده</span>{/if}</td></tr>
						{/foreach}
						{/if}
						</table>
					</div>
					{/if}
				</div>
			</div>

		</div>
	</div>
</div>

{include file="footer.tpl"}