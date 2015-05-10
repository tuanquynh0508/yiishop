<?php
use common\models\Product;
?>

<!-- ZONE-1================================================================= -->
<?php $this->beginBlock('zone-1'); ?>

	<?= frontend\widgets\categoryMenuWidget::widget([]) ?>

<?php $this->endBlock(); ?>

<!-- ZONE-2================================================================= -->
<?php $this->beginBlock('zone-2'); ?>

	<?php echo yii\base\View::render('//partials/topMenu',array()); ?>

	<?php echo yii\base\View::render('//partials/slideShow',array()); ?>

	<?= frontend\widgets\tabProductWidget::widget([]) ?>

<?php $this->endBlock(); ?>

<!-- ZONE-3================================================================= -->
<?php $this->beginBlock('zone-3'); ?>

<?php if(!empty($listCategory)): ?>
<?php foreach ($listCategory as $category): ?>
<div class="col-sm-12 col-lg-12 col-md-12">
	<div class="box box-primary productList1">
		<div class="box-header with-border">
			<h3 class="box-title text-bold text-primary"><i class="fa fa-chevron-circle-right"></i> <?= $category->title ?></h3>
			<div class="box-tools pull-right">
				<a href="<?= Yii::$app->urlManager->createUrl(['/product/default/category', 'cateslug' => $category->slug]) ?>" class="btn btn-box-tool" type="button"><i class="fa fa-share-square-o"></i> Xem thêm</a>
			</div><!-- /.box-tools -->
		</div><!-- /.box-header -->
		<div class="box-body">

			<div class="row">
				<?php $listProduct = Product::getProductByCategory($category->id); ?>
				<?php foreach ($listProduct as $item): ?>
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
									<strong>Giá khuyến mãi: <span class="text-red"><?= $item->getSalePrice() ?> <u>đ</u></span></strong>
									(<span style="text-decoration: line-through;"><?= $item->retail_price ?> <u>đ</u></span>)
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

			</div>

		</div><!-- /.box-body -->
	</div><!-- /.box -->

</div><!-- /.col-sm-12 col-lg-12 col-md-12 -->
<?php endforeach; ?>
<?php endif; ?>

<?php $this->endBlock(); ?>