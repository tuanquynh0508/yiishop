<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Breadcrumbs;

$baseUrl = Yii::$app->request->baseUrl;

$this->title = $product->title;
$this->params['breadcrumbs'][] = $this->title;

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

	<?= frontend\widgets\categoryMenuWidget::widget([]) ?>

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
	
	<?= Breadcrumbs::widget([
		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
	]) ?>

	<div class="row">
		<div class="col-sm-4 margin-bottom">
			<p><img class="img-thumbnail" src="<?= $product->getDefaultImg('m') ?>"/></p>
			<?php
				foreach($product->inputImgs as $key => $img):
				if($img->default) {
					continue;
				}
			?>
			<img src="<?= Yii::getAlias('@img_path/product/'.Yii::$app->params['upload_var']['small']['prefix'].'/').$img->file ?>" height="50" width="50"/>
			<?php endforeach; ?>
		</div>
		<div class="col-sm-8 productSumaryBox">
			<h1 class="title"><?= $product->title ?></h1>
			<p>
				<strong>Mã hàng:</strong> <?= $product->upc ?> |
				<strong>Kho:</strong> <span class="text-danger"><?= ($product->out_of_stock==0)?'Còn hàng':'Hết hàng' ?></span> |
				<?php
					if ($product->is_new == 1) {
						echo  '<span class="label label-primary">Hàng mới</span>&nbsp;';
					}
					if ($product->is_special == 1) {
						echo '<span class="label label-warning">Đặc biệt</span>';
					}
				?>
			</p>
			<hr>
			<span class="price">
				<small>Giá bán:</small>				
				<?php if($product->retail_price == 0): ?>
					<strong class="price-value text-red">Liên hệ</strong>
				<?php else: ?>
					<?php if($product->getSalePrice() != 0): ?>
					<strong class="price-value text-red"><?= $product->getSalePrice() ?> <u>đ</u></strong>
					-
					<strong class="price-value-old text-red"><?= $product->retail_price ?> <u>đ</u></strong>
					<?php else: ?>
					<strong class="price-value text-red"><?= $product->retail_price ?> <u>đ</u></strong>
					<?php endif; ?>
				<?php endif; ?>
			</span>
			<hr>

			<?php
				$listOptions = $product->getListOptionsGroup();
				if(!empty($listOptions->group)):
				foreach ($listOptions->group as $optionGroup):
			?>
			<p>
				<strong><?= $optionGroup->title ?>:</strong>
				<?php
					$arrayOption = array();
					$sperator = ", ";
					foreach ($listOptions->options[$optionGroup->id] as $option) {
						if($optionGroup->option_type == 'color') {
							$arrayOption[] = '<i class="fa fa-square fa-lg" style="color:'.$option->title.';"></i> &nbsp;';
							$sperator = "";
						} else {
							$arrayOption[] = $option->title.' '.$listOptions->values[$optionGroup->id.'-'.$option->id];
						}
					}
					echo implode($sperator, $arrayOption);
				?>
			</p>
			<?php
				endforeach;
				endif;
			?>

			<p><strong>Xuất sứ:</strong> <?= $product->getFullMade() ?></p>

			<hr/>

			<div class="clearfix">
					<label>Số lượng:</label>
					<input type="number" value="1" class="form-control" style="width: 80px;display: inline-block;vertical-align: middle;margin-right: 5px;"/>
					 / <?= $product->quantity ?>
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
<!--				<li><a href="#tab_2" data-toggle="tab">Đánh giá</a></li>-->
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="tab_1">
					<div class="box-body">
						<?= $product->description ?>
					</div>
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