<?php

use yii\helpers\Html;
use yii\web\View;

$baseUrl = Yii::$app->request->baseUrl;

$this->registerCssFile($baseUrl . '/cuahangnhua/plugins/ionslider/ion.rangeSlider.css', ['depends' => [\frontend\assets\CuahangnhuaAsset::className()]]);
$this->registerCssFile($baseUrl . '/cuahangnhua/plugins/ionslider/ion.rangeSlider.skinNice.css', ['depends' => [\frontend\assets\CuahangnhuaAsset::className()]]);
$this->registerJsFile($baseUrl . '/cuahangnhua/plugins/ionslider/ion.rangeSlider.min.js', ['depends' => [\yii\bootstrap\BootstrapPluginAsset::className()]]);
$this->registerJs("
$(function () {
	$(\"#searchByPrice\").ionRangeSlider();
});
", View::POS_END);
?>
<div class="row" id="bodyFirst">

	<div class="col-sm-3 col-lg-3 col-md-3">

		<!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" id="categoryMenu">
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu">
				<li class="header">Danh mục sản phẩm</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-arrow-circle-o-right"></i> <span>Danh mục 1</span> <i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li><a href="#"><i class="fa fa-long-arrow-right"></i> Dashboard v1</a></li>
						<li><a href="#"><i class="fa fa-long-arrow-right"></i> Dashboard v2</a></li>
					</ul>
				</li>
				<li><a href="#"><i class="fa fa-circle-o text-info"></i> Information</a></li>
			</ul>
        </section>
        <!-- /.sidebar -->

		<div class="box box-default box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Tìm theo màu sắc</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<div class="colorFilter">
					<i class="fa fa-square fa-3x active" style="color:#000000;"></i>
					<i class="fa fa-square fa-3x" style="color:#b5b5b5;"></i>
					<i class="fa fa-square fa-3x" style="color:#ff0000;"></i>
					<i class="fa fa-square fa-3x" style="color:#0056ff;"></i>
					<i class="fa fa-square fa-3x" style="color:#1dd100;"></i>
					<i class="fa fa-square fa-3x" style="color:#000000;"></i>
					<i class="fa fa-square fa-3x" style="color:#000000;"></i>
					<i class="fa fa-square fa-3x" style="color:#000000;"></i>
					<i class="fa fa-square fa-3x" style="color:#000000;"></i>
				</div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->

		<div class="box box-default box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Tìm theo giá</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<input id="searchByPrice" type="text" name="searchByPrice" value="1000;100000" data-type="double" data-step="500" data-postfix=" VND" data-from="30000" data-to="90000" data-hasgrid="true" />
			</div><!-- /.box-body -->
		</div><!-- /.box -->

	</div><!-- /.col-sm-2 -->

	<div class="col-sm-9 col-lg-9 col-md-9">


		<nav class="navbar navbar-default" id="pageMenuTop">
			<div class="container-fluid">
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#"><i class="fa fa-home"></i> Trang chủ</a></li>
						<li><a href="#"><i class="fa fa-gift"></i> Hướng dẫn mua hàng</a></li>
						<li><a href="#"><i class="fa fa-credit-card"></i> Thanh toán</a></li>
						<li><a href="#"><i class="fa fa-truck"></i> Vận chuyển</a></li>
						<li><a href="#"><i class="fa fa-umbrella"></i> Đổi hàng</a></li>
						<li><a href="#"><i class="fa fa-envelope"></i> Liên hệ</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>

		<ul class="breadcrumb">
			<li><a href="/backend/">Trang chủ</a></li>
			<li><a href="/backend/product/default/index">Products</a></li>
			<li><a href="/backend/product/default/index">Danh mục 1</a></li>
			<li class="active">Sản phẩm 1</li>
		</ul>

		<div class="row">
			<div class="col-sm-4">
				<p><img class="img-thumbnail" src="http://img.yiishop.local/md_nopicture.jpg"/></p>
			</div>
			<div class="col-sm-8 productSumaryBox">
				<h1 class="title">Sản phẩm 1</h1>
				<p>
					<strong>Mã hàng:</strong> sp-03 |
					<strong>Kho:</strong> <span class="text-danger">Còn hàng</span> |
					<span class="label label-primary">Hàng mới</span>&nbsp;<span class="label label-warning">Đặc biệt</span>					</p>
				<hr>
				<span class="price">
						<small>Giá bán:</small>
						<strong class="price-value text-red">280.000 VND</strong>
						-
						<strong class="price-value-old text-red">280.000 VND</strong>
					</span>
				<hr>

				<p>
					<strong>Kích thước sản phẩm:</strong>
					Chiều rộng 30 cm, Chiều dài 40 cm, Chiều cao 50 cm					</p>
				<p>
					<strong>Màu sắc:</strong>
					<i class="fa fa-square fa-lg" style="color:#000000;"></i> &nbsp;<i class="fa fa-square fa-lg" style="color:#b5b5b5;"></i> &nbsp;<i class="fa fa-square fa-lg" style="color:#ff0000;"></i> &nbsp;<i class="fa fa-square fa-lg" style="color:#0056ff;"></i> &nbsp;<i class="fa fa-square fa-lg" style="color:#1dd100;"></i> &nbsp;					</p>

				<p><strong>Xuất sứ:</strong> Việt Nam - zxcxczv</p>

				<hr/>

				<div class="clearfix">
						<label>Số lượng:</label>
						<input type="number" value="1" class="form-control" style="width: 80px;display: inline-block;vertical-align: middle;margin-right: 5px;"/>
						<button type="button" class="btn btn-success">
							<i class="fa fa-shopping-cart"></i>
							Cho vào giỏ hàng
						</button>
				</div>

			</div>
		</div><!-- /.row -->

		<!-- Custom Tabs (Pulled to the right) -->
			<div class="nav-tabs-justified custom-tab-primary">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab_1" data-toggle="tab">Mô tả sản phẩm</a></li>
					<li><a href="#tab_2" data-toggle="tab">Đánh giá</a></li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane active" id="tab_1">
						<div class="box-body">
							Chu thich						</div>
					</div><!-- /.tab-pane -->

					<div class="tab-pane" id="tab_2">
						<div class="box-body">

						</div>
					</div><!-- /.tab-pane -->

				</div><!-- /.tab-content -->

			</div><!-- nav-tabs-custom -->

	</div>

</div><!-- /#bodyFirst -->

<div class="row" id="infoBoxBottom">
	<div class="col-sm-6 col-lg-6 col-md-6">
		<p><strong>Số 153 phố Khâm Thiên, phường Thổ Quan, quận Đống Đa, Hà Nội</strong></p>
		<p><strong>Điện thoại:</strong> 04-123456789 - <strong>Fax:</strong> 04-123456789</p>
		<p><strong>Enail:</strong> <a href="mailto:sale@dogiadungphongthuy.com">sale@dogiadungphongthuy.com</a></p>
	</div><!-- /."col-sm-5 col-lg-5 col-md-5 -->
	<div class="col-sm-2 col-lg-2 col-md-2">
		<p><a href="#"><i class="fa fa-arrow-circle-right"></i> Thỏa thuận dịch vụ</a></p>
		<p><a href="#"><i class="fa fa-arrow-circle-right"></i> Thỏa thuận dịch vụ</a></p>
		<p><a href="#"><i class="fa fa-arrow-circle-right"></i> Thỏa thuận dịch vụ</a></p>
	</div>
	<div class="col-sm-2 col-lg-2 col-md-2">
		<p><a href="#"><i class="fa fa-arrow-circle-right"></i> Thỏa thuận dịch vụ</a></p>
		<p><a href="#"><i class="fa fa-arrow-circle-right"></i> Thỏa thuận dịch vụ</a></p>
		<p><a href="#"><i class="fa fa-arrow-circle-right"></i> Thỏa thuận dịch vụ</a></p>
	</div>
	<div class="col-sm-2 col-lg-2 col-md-2">
		<p><a href="#"><i class="fa fa-arrow-circle-right"></i> Thỏa thuận dịch vụ</a></p>
		<p><a href="#"><i class="fa fa-arrow-circle-right"></i> Thỏa thuận dịch vụ</a></p>
		<p><a href="#"><i class="fa fa-arrow-circle-right"></i> Thỏa thuận dịch vụ</a></p>
	</div>
</div><!-- /#footerPage -->