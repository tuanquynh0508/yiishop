<?php
use yii\helpers\Html;
?>

<div class="categories-product-item">
    <div class="categories-product-item-warpper">
        <?php if($product->getSalePrice() != 0): ?>
        <span class="sale-price">-<?= $product->sales[0]->sale ?>%</span>
        <?php endif; ?>
        <div class="categories-product-item-thumb">
            <a href="<?= Yii::$app->urlManager->createUrl(['product/default/detail', 'slug' => $product->slug]) ?>" title="<?= $product->title ?>">
                <?php echo Html::img($product->getDefaultImg('m'), []); ?>
            </a>
        </div>
        <div class="categories-product-item-text">
            <p>
              <a href="<?= Yii::$app->urlManager->createUrl(['product/default/detail', 'slug' => $product->slug]) ?>" class="font-16 color-grey-dard">
                <?= $product->title ?>
              </a>
            </p>
        </div>
        <div class="categories-product-item-button">
          <p class="font-18">
            <?php if($product->retail_price == 0): ?>
              <strong><span class="color-red-dard font-14">Liên hệ để biết giá</span></strong>
            <?php else: ?>
              <?php if($product->getSalePrice() != 0): ?>
                <strong><span class="color-red-dard"><?= Yii::$app->utility->asCurrency($product->getSalePrice()) ?></span></strong>
                <span class="color-grey-high">(<span class="text-cross"><?= Yii::$app->utility->asCurrency($product->retail_price) ?></span>)</span>
              <?php else: ?>
                <strong><span class="color-red-dard"><?= Yii::$app->utility->asCurrency($product->retail_price) ?></span></strong>
              <?php endif; ?>
            <?php endif; ?>
          </p>
        <?php if($product->out_of_stock == 0): ?>
          <p><span class="tq-icon tq-icon-16 tq-icon-instock"></span></p>
          <button class="btn btn-shopping-cart"><span>Cho vào giỏ hàng</span></button>
        <?php else: ?>
          <p><span class="tq-icon tq-icon-16 tq-icon-outstock"></span></p>
          <button class="btn btn-shopping-cart btn-disable"><span>Cho vào giỏ hàng</span></button>
        <?php endif; ?>
        </div>
    </div><!-- /.categories-product-item-warpper -->
</div><!-- /.categories-product-item -->