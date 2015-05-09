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

<!-- ZONE-1================================================================= -->
<?php $this->beginBlock('zone-1'); ?>

	<?php echo yii\base\View::render('//partials/categoryMenu',array()); ?>

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

<?php $this->endBlock(); ?>

<!-- ZONE-2================================================================= -->
<?php $this->beginBlock('zone-2'); ?>

	<?php echo yii\base\View::render('//partials/topMenu',array()); ?>
	
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

<?php $this->endBlock(); ?>

<!-- ZONE-3================================================================= -->
<?php //$this->beginBlock('zone-3'); ?>

<?php //$this->endBlock(); ?>