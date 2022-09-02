<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
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
					<div style="border-bottom: 1px solid rgb(231, 231, 231);text-align: center;font-size: 12px;padding-bottom: 9px;" class="fa_num">{$today_date}</div>
					<div style="text-align:center;line-height: 35px !important;margin: 15px 0px 10px 0px !important;">
						<img alt="inax" src="templates/images/logo.png" class="img-circle">
					</div>
				</li>

				<li><a {if isset($index_active) }class="active"{/if} href="./"><i class="fa fa-home fa-fw"></i> صفحه اصلی</a></li>
				<li><a {if isset($charge_active) }class="active"{/if} href="topup.php"><i class="fa fa-retweet fa-fw"></i> خرید شارژ مستقیم</a></li>
				<li><a {if isset($pin_active) }class="active"{/if} href="pin.php"><i class="fa fa-retweet fa-fw"></i> خرید کارت شارژ</a></li>
				<li><a {if isset($internet_active) }class="active"{/if} href="internet.php"><i class="fa fa-bars fa-fw"></i> بسته اینترنت</a></li>
				<li><a {if isset($bill_active) }class="active"{/if} href="bill.php"><i class="fa fa-money fa-fw"></i> پرداخت قبض</a></li>
				<!--<li><a {if isset($trans_active) }class="active"{/if} href="trans.php"><i class="fa fa-money fa-fw"></i> تراکنش ها</a></li>-->
			</ul>
			
		</div>
	</div>
</nav>