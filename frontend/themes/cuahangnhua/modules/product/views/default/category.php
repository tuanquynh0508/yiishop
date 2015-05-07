<?php
use yii\helpers\Html;
use yii\web\View;

$baseUrl = Yii::$app->request->baseUrl;

$this->registerCssFile($baseUrl.'/cuahangnhua/plugins/ionslider/ion.rangeSlider.css', ['depends' => [\frontend\assets\CuahangnhuaAsset::className()]]);
$this->registerCssFile($baseUrl.'/cuahangnhua/plugins/ionslider/ion.rangeSlider.skinNice.css', ['depends' => [\frontend\assets\CuahangnhuaAsset::className()]]);
$this->registerJsFile($baseUrl.'/cuahangnhua/plugins/ionslider/ion.rangeSlider.min.js', ['depends' => [\yii\bootstrap\BootstrapPluginAsset::className()]]);
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
			<li class="active">Sản phẩm 3</li>
		</ul>

		<div class="clearfix margin-bottom">
			<div class="pull-right">
				Sắp xếp:
				<select id="input-sort">
					<option value="" selected="selected">Tên (A - Z)</option>
					<option value="">Tên (Z - A)</option>
					<option value="">Giá (Thấp &gt; Cao)</option>
					<option value="">Giá (Cao &gt; Thấp)</option>
					<option value="">Xem (Nhiều nhất)</option>
					<option value="">Xem (Ít nhất)</option>
				</select>
				Hiển thị:
				<select id="input-show">
					<option value="" selected="selected">12</option>
					<option value="">16</option>
					<option value="">20</option>
					<option value="">24</option>
					<option value="">28</option>
				</select>
			</div>
	    </div>

		<div class="row">
			<div class="col-sm-3 col-lg-3 col-md-3 product-item">
				<div class="thumbnail">
					<img src="http://img.yiishop.local/md_nopicture.jpg">
					<div class="caption">
						<h4 class="text-center"><a href="#">Tên sản phẩm sẽ nằm ở đây nha</a></h4>
						<p class="text-center"><strong>Giá bán: <span class="text-red">280.000 VND</span></strong></p>
					</div>
					<div class="button clearfix">
						<button class="btn btn-default btn-sm pull-left" type="button">
							<i class="fa fa-shopping-cart"></i> Đặt hàng
						</button>
						<button class="btn btn-default btn-sm pull-right" type="button">
							<i class="fa fa-search"></i> Chi tiết
						</button>
					</div>
				</div>
			</div><!-- /.product-item -->

			<div class="col-sm-3 col-lg-3 col-md-3 product-item">
				<div class="thumbnail">
					<img src="http://img.yiishop.local/md_nopicture.jpg">
					<div class="caption">
						<h4 class="text-center"><a href="#">Tên sản phẩm sẽ nằm ở đây nha</a></h4>
						<p class="text-center"><strong>Giá bán: <span class="text-red">280.000 VND</span></strong></p>
					</div>
					<div class="button clearfix">
						<button class="btn btn-default btn-sm pull-left" type="button">
							<i class="fa fa-shopping-cart"></i> Đặt hàng
						</button>
						<button class="btn btn-default btn-sm pull-right" type="button">
							<i class="fa fa-search"></i> Chi tiết
						</button>
					</div>
				</div>
			</div><!-- /.product-item -->

			<div class="col-sm-3 col-lg-3 col-md-3 product-item">
				<div class="thumbnail">
					<img src="http://img.yiishop.local/md_nopicture.jpg">
					<div class="caption">
						<h4 class="text-center"><a href="#">Tên sản phẩm sẽ nằm ở đây nha</a></h4>
						<p class="text-center"><strong>Giá bán: <span class="text-red">280.000 VND</span></strong></p>
					</div>
					<div class="button clearfix">
						<button class="btn btn-default btn-sm pull-left" type="button">
							<i class="fa fa-shopping-cart"></i> Đặt hàng
						</button>
						<button class="btn btn-default btn-sm pull-right" type="button">
							<i class="fa fa-search"></i> Chi tiết
						</button>
					</div>
				</div>
			</div><!-- /.product-item -->

			<div class="col-sm-3 col-lg-3 col-md-3 product-item">
				<div class="thumbnail">
					<img src="http://img.yiishop.local/md_nopicture.jpg">
					<div class="caption">
						<h4 class="text-center"><a href="#">Tên sản phẩm sẽ nằm ở đây nha</a></h4>
						<p class="text-center"><strong>Giá bán: <span class="text-red">280.000 VND</span></strong></p>
					</div>
					<div class="button clearfix">
						<button class="btn btn-default btn-sm pull-left" type="button">
							<i class="fa fa-shopping-cart"></i> Đặt hàng
						</button>
						<button class="btn btn-default btn-sm pull-right" type="button">
							<i class="fa fa-search"></i> Chi tiết
						</button>
					</div>
				</div>
			</div><!-- /.product-item -->

			<div class="col-sm-3 col-lg-3 col-md-3 product-item">
				<div class="thumbnail">
					<img src="http://img.yiishop.local/md_nopicture.jpg">
					<div class="caption">
						<h4 class="text-center"><a href="#">Tên sản phẩm sẽ nằm ở đây nha</a></h4>
						<p class="text-center"><strong>Giá bán: <span class="text-red">280.000 VND</span></strong></p>
					</div>
					<div class="button clearfix">
						<button class="btn btn-default btn-sm pull-left" type="button">
							<i class="fa fa-shopping-cart"></i> Đặt hàng
						</button>
						<button class="btn btn-default btn-sm pull-right" type="button">
							<i class="fa fa-search"></i> Chi tiết
						</button>
					</div>
				</div>
			</div><!-- /.product-item -->

			<div class="col-sm-3 col-lg-3 col-md-3 product-item">
				<div class="thumbnail">
					<img src="http://img.yiishop.local/md_nopicture.jpg">
					<div class="caption">
						<h4 class="text-center"><a href="#">Tên sản phẩm sẽ nằm ở đây nha</a></h4>
						<p class="text-center"><strong>Giá bán: <span class="text-red">280.000 VND</span></strong></p>
					</div>
					<div class="button clearfix">
						<button class="btn btn-default btn-sm pull-left" type="button">
							<i class="fa fa-shopping-cart"></i> Đặt hàng
						</button>
						<button class="btn btn-default btn-sm pull-right" type="button">
							<i class="fa fa-search"></i> Chi tiết
						</button>
					</div>
				</div>
			</div><!-- /.product-item -->

			<div class="col-sm-3 col-lg-3 col-md-3 product-item">
				<div class="thumbnail">
					<img src="http://img.yiishop.local/md_nopicture.jpg">
					<div class="caption">
						<h4 class="text-center"><a href="#">Tên sản phẩm sẽ nằm ở đây nha</a></h4>
						<p class="text-center"><strong>Giá bán: <span class="text-red">280.000 VND</span></strong></p>
					</div>
					<div class="button clearfix">
						<button class="btn btn-default btn-sm pull-left" type="button">
							<i class="fa fa-shopping-cart"></i> Đặt hàng
						</button>
						<button class="btn btn-default btn-sm pull-right" type="button">
							<i class="fa fa-search"></i> Chi tiết
						</button>
					</div>
				</div>
			</div><!-- /.product-item -->

			<div class="col-sm-3 col-lg-3 col-md-3 product-item">
				<div class="thumbnail">
					<img src="http://img.yiishop.local/md_nopicture.jpg">
					<div class="caption">
						<h4 class="text-center"><a href="#">Tên sản phẩm sẽ nằm ở đây nha</a></h4>
						<p class="text-center"><strong>Giá bán: <span class="text-red">280.000 VND</span></strong></p>
					</div>
					<div class="button clearfix">
						<button class="btn btn-default btn-sm pull-left" type="button">
							<i class="fa fa-shopping-cart"></i> Đặt hàng
						</button>
						<button class="btn btn-default btn-sm pull-right" type="button">
							<i class="fa fa-search"></i> Chi tiết
						</button>
					</div>
				</div>
			</div><!-- /.product-item -->

		</div><!-- /.row -->

		<ul class="pagination">
			<li>
			  <a href="#" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
			  </a>
			</li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li>
			  <a href="#" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			  </a>
			</li>
		  </ul>

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