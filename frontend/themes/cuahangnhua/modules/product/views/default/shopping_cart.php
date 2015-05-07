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
			<li class="active">Giỏ hàng</li>
		</ul>

		<div class="cart-item-list">
			<h3 class="text-green"><span class="img-circle bg-green number-box-30">1</span> Thông tin giỏ hàng</h3>
			<table class="table table-bordered shopping-cart-table">
				<thead>
					<tr>
						<th width="5%">STT</th>
						<th width="45%">Sản phẩm</th>
						<th width="15%">Đơn giá</th>
						<th width="15%">Số lượng</th>
						<th width="15%">Thành tiền</th>
						<th width="5%">Xóa</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center">1</td>
						<td>
							<img class="img-thumbnail" src="http://img.yiishop.local/sm_nopicture.jpg"/>
							<a href="#"><strong>Sản phẩm 1</strong></a>
						</td>
						<td class="text-center">180.000 VND</td>
						<td class="text-center"><input type="number" class="form-control cart-item-quantity text-center" value="1"/></td>
						<td class="text-center">180.000 VND</td>
						<td class="text-center"><button class="btn btn-sm btn-danger" type="button"><i class="fa fa-trash-o"></i></button></td>
					</tr>
					<tr>
						<td class="text-center">1</td>
						<td>
							<img class="img-thumbnail" src="http://img.yiishop.local/sm_nopicture.jpg"/>
							<a href="#"><strong>Sản phẩm 1</strong></a>
						</td>
						<td class="text-center">180.000 VND</td>
						<td class="text-center"><input type="number" class="form-control cart-item-quantity text-center" value="1"/></td>
						<td class="text-center">180.000 VND</td>
						<td class="text-center"><button class="btn btn-sm btn-danger" type="button"><i class="fa fa-trash-o"></i></button></td>
					</tr>
					<tr>
						<td class="text-center">1</td>
						<td>
							<img class="img-thumbnail" src="http://img.yiishop.local/sm_nopicture.jpg"/>
							<a href="#"><strong>Sản phẩm 1</strong></a>
						</td>
						<td class="text-center">180.000 VND</td>
						<td class="text-center"><input type="number" class="form-control cart-item-quantity text-center" value="1"/></td>
						<td class="text-center">180.000 VND</td>
						<td class="text-center"><button class="btn btn-sm btn-danger" type="button"><i class="fa fa-trash-o"></i></button></td>
					</tr>
					<tr>
						<td class="text-center">1</td>
						<td>
							<img class="img-thumbnail" src="http://img.yiishop.local/sm_nopicture.jpg"/>
							<a href="#"><strong>Sản phẩm 1</strong></a>
						</td>
						<td class="text-center">180.000 VND</td>
						<td class="text-center"><input type="number" class="form-control cart-item-quantity text-center" value="1"/></td>
						<td class="text-center">180.000 VND</td>
						<td class="text-center"><button class="btn btn-sm btn-danger" type="button"><i class="fa fa-trash-o"></i></button></td>
					</tr>
				</tbody>
				<tfoot class="bg-warning">
					<tr>
						<td colspan="4">
							<strong>Tổng tiền</strong><br/>
							(Chưa bao gồm phí vận chuyển)
						</td>
						<td colspan="2">
							<strong class="text-red">4.000.000 VND</strong>
						</td>
					</tr>
				</tfoot>
			</table>
		</div>

		<div class="row">
			<div class="col-sm-6 col-lg-6 col-md-6">
				<h3 class="text-green"><span class="img-circle bg-green number-box-30">2</span> Thông tin khách hàng</h3>
			</div>
			<div class="col-sm-6 col-lg-6 col-md-6">
				<h3 class="text-green"><span class="img-circle bg-green number-box-30">3</span> Hình thức thanh toán</h3>
				<h3 class="text-green"><span class="img-circle bg-green number-box-30">4</span> Hình thức vận chuyển</h3>
			</div>
		</div><!-- /.row -->

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