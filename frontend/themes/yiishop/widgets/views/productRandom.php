<?php
use yii\helpers\Html;

$baseUrl = Yii::$app->request->baseUrl;
?>

<div class="box-product-top">
		<div class="box-product-top-thumb">
				<a href="<?= Yii::$app->urlManager->createUrl(['product/default/detail', 'slug' => $product->slug]) ?>" title="Product">
						<?php echo Html::img($product->getDefaultImg('m'), []); ?>
				</a>
		</div><!-- /.box-product-top-img-thumb -->
		<div class="box-product-top-text">
				<p>
					<a href="<?= Yii::$app->urlManager->createUrl(['product/default/detail', 'slug' => $product->slug]) ?>" class="font-18 font-bold color-base-text">
						<?= $product->title ?>
					</a>
				</p>
				<p class="font-18">
					<?php if($product->retail_price == 0): ?>
            <strong><span class="color-red-dard">Liên hệ để biết giá</span></strong>
          <?php else: ?>
            <?php if($product->getSalePrice() != 0): ?>
              <strong><span class="color-red-dard"><?= Yii::$app->utility->asCurrency($product->getSalePrice()) ?></span></strong>
              <span class="color-grey-high">(<span class="text-cross"><?= Yii::$app->utility->asCurrency($product->retail_price) ?></span>)</span>
            <?php else: ?>
              <strong><span class="color-red-dard"><?= Yii::$app->utility->asCurrency($product->retail_price) ?></span></strong>
            <?php endif; ?>
          <?php endif; ?>
				</p>
		</div>
		<div class="box-tag"><span>Sản phẩm đặc biệt</span></div>
</div><!-- /.box-product-top -->