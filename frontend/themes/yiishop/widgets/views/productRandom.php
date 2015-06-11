<?php
use yii\helpers\Html;

$baseUrl = Yii::$app->request->baseUrl;
?>

<div class="box-product-top">
		<div class="box-product-top-thumb">
				<a href="#" title="Product">
						<?php echo Html::img($baseUrl . '/yiishop/tmp/example-1.jpg', []); ?>
				</a>
		</div><!-- /.box-product-top-img-thumb -->
		<div class="box-product-top-text">
				<p><a href="#" class="font-18 font-bold color-base-text">universal multifunction charger cable connectors with usb port</a></p>
				<p class="font-18">
						<strong><span class="color-red-dard">63000 <u>đ</u></span></strong>
						<span class="color-grey-high">(<span class="text-cross">65000 <u>đ</u></span>)</span>
				</p>
		</div>
		<div class="box-tag"><span>Sản phẩm đặc biệt</span></div>
</div><!-- /.box-product-top -->