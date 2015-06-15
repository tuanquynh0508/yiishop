<?php
use common\models\Product;
use yii\helpers\Html;
use yii\web\View;

$baseUrl = Yii::$app->request->baseUrl;

$this->registerJsFile($baseUrl.'/yiishop/js/jquery.carouFredSel.js', ['depends' => [\frontend\assets\YiishopAsset::className()]]);
$this->registerJsFile($baseUrl.'/yiishop/js/jquery.transit.min.js', ['depends' => [\frontend\assets\YiishopAsset::className()]]);
$this->registerJs("
$('#slideTopWrapper').carouFredSel({
		circular: false,
		infinite: false,
		items: {
			visible: 1,
			width: 800,
			height: 300
		},
		scroll: {
			items: 1,
			fx: 'cover-fade'
		},
		circular: true,
		infinite: true,
		auto: 5e3,
		prev: $('#slideTopWrapperPrev'),
		next: $('#slideTopWrapperNext')
});
", View::POS_END);
?>
<!-- zone-before-body======================================================= -->
<?php $this->beginBlock('zone-before-body'); ?>
<div id="midWrapper" class="clearfix margin-vertical-bottom">
		<div class="grid_5">
				<?= frontend\widgets\productRandomWidget::widget([]) ?>
		</div>
		<div class="grid_10">
				<?php echo yii\base\View::render('//partials/slideShow',array()); ?>
		</div>
</div><!-- /#midWrapper -->
<?php $this->endBlock(); ?>

<!-- zone-body============================================================== -->
<?php $this->beginBlock('zone-body'); ?>

<?= frontend\widgets\tabProductWidget::widget([]) ?>

<?php if(!empty($listCategory)): ?>
<?php foreach ($listCategory as $category): ?>
<div class="categories-product margin-vertical-bottom grid_15">
		<div class="categories-product-head"><h2><?= $category->title ?></h2></div>
		<div class="categories-product-list">
				<div class="clearfix">
					<?php
						$listProduct = Product::getProductByCategory($category->id);
						foreach ($listProduct as $item) {
							echo yii\base\View::render('//partials/productItem',array('product' => $item));
						}
					?>
				</div>
		</div><!-- /.categories-product-list -->
		<div class="categories-product-footer">
				<div class="clearfix">
						<div class="grid_10 alpha">
								<div class="categories-product-sub">
										<a href="#">Sub danh mục 1</a> |
										<a href="#">Sub danh mục 2</a> |
										<a href="#">Sub danh mục 3</a> |
										<a href="#">Sub danh mục 4</a>
								</div>
						</div>
						<div class="grid_5 omega text-right">
								<a href="<?= Yii::$app->urlManager->createUrl(['/product/default/category', 'cateslug' => $category->slug]) ?>" class="btn btn-more"><span>Xem thêm</span></a>
						</div>
				</div>
		</div><!-- /.categories-product-footer -->
</div><!-- /.category-product-item -->

<div class="clear"></div>
<?php endforeach; ?>
<?php endif; ?>

<?php $this->endBlock(); ?>