<?php
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\LinkPager;
use yii\widgets\Breadcrumbs;

$baseUrl = Yii::$app->request->baseUrl;

$this->title = $category->title;
if($category->getParentName() != '') {
	$this->params['breadcrumbs'][] = ['label' => $category->getParentName(), 'url' => ['/product/default/category', 'cateslug' => $category->parent->slug]];
}
$this->params['breadcrumbs'][] = $this->title;

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
	
	<?php if(!empty($products)): ?>
	<div class="row">
		
		<?php foreach ($products as $item): ?>
		<div class="col-sm-3 col-lg-3 col-md-3 product-item">					
			<div class="thumbnail">
				<?php if($item->getSalePrice() != 0): ?>
				<div class="sign-sale"><span>Sale</span></div>
				<?php else: ?>
					<?php if($item->is_new == 1): ?>
					<div class="sign-new"><span>New</span></div>
					<?php endif; ?>
				<?php endif; ?>
				<img src="<?= $item->getDefaultImg('m') ?>" height="150" style="height: 150px !important;"/>
				<div class="caption">
					<h4 class="text-center"><a href="<?= Yii::$app->urlManager->createUrl(['product/default/detail', 'slug' => $item->slug]) ?>"><?= $item->title ?></a></h4>

					<?php if($item->retail_price == 0): ?>
						<p class="text-center"><strong>Giá bán: <span class="text-red">Liên hệ</strong></p>
					<?php else: ?>
						<?php if($item->getSalePrice() != 0): ?>
						<p class="text-center">
							<strong>Giá: <span class="text-red"><?= $item->getSalePrice() ?> <u>đ</u></span></strong> - 
							<span style="text-decoration: line-through;"><?= $item->retail_price ?> <u>đ</u></span>
						</p>
						<?php else: ?>
						<p class="text-center"><strong>Giá bán: <span class="text-red"><?= $item->retail_price ?> <u>đ</u></span></strong></p>
						<?php endif; ?>
					<?php endif; ?>
				</div>
				<div class="button clearfix">
					<a href="<?= Yii::$app->urlManager->createUrl(['error/under-construction']) ?>" class="btn btn-default btn-sm pull-left">
						<i class="fa fa-shopping-cart"></i> Đặt hàng
					</a>
					<a href="<?= Yii::$app->urlManager->createUrl(['product/default/detail', 'slug' => $item->slug]) ?>" class="btn btn-default btn-sm pull-right">
						<i class="fa fa-search"></i> Chi tiết
					</a>
				</div>
			</div>
		</div><!-- /.product-item -->
		<?php endforeach; ?>

	</div><!-- /.row -->
	<?php endif; ?>

	<?= LinkPager::widget([
		'pagination' => $pagination,
	]); ?>

<?php $this->endBlock(); ?>

<!-- ZONE-3================================================================= -->
<?php //$this->beginBlock('zone-3'); ?>

<?php //$this->endBlock(); ?>