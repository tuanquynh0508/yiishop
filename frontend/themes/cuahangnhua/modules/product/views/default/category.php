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

<?php $this->endBlock(); ?>

<!-- ZONE-3================================================================= -->
<?php //$this->beginBlock('zone-3'); ?>

<?php //$this->endBlock(); ?>