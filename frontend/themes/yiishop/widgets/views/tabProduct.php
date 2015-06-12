<?php
use yii\web\View;

$baseUrl = Yii::$app->request->baseUrl;

$this->registerJsFile($baseUrl.'/yiishop/js/jquery.tqTab.js', ['depends' => [\frontend\assets\YiishopAsset::className()]]);
$this->registerJsFile($baseUrl.'/yiishop/js/jquery.cookie.js', ['depends' => [\frontend\assets\YiishopAsset::className()]]);
$this->registerJs("
$('.box-tab-1').tqTab({
		defaultTab: '#tab-1',
		useCookie: true,
		cookieId: 'yiishopHomeTab'
});
", View::POS_END);
?>
<div class="box-tab box-tab-1 grid_15 margin-vertical-bottom">
		<div class="box-tab-head border-top">
				<ul class="clearfix">
						<li class="active"><a href="#tab-1">Sản phẩm mới</a></li>
						<li><a href="#tab-2">Sản phẩm xem nhiều</a></li>
						<li><a href="#tab-3">Sản phẩm khuyến mãi</a></li>
				</ul>
		</div><!-- /.box-tab-head -->
		<div class="box-tab-content">
				<div id="tab-1">
						<?php if(!empty($newProducts)): ?>
						<div class="categories-product categories-product-tab">
								<div class="categories-product-list">
										<div class="clearfix">
												<?php
													foreach ($newProducts as $item) {
														echo yii\base\View::render('//partials/productItem',array('product' => $item));
													}
												?>
										</div>
								</div><!-- /.categories-product-list -->
						</div><!-- /.category-product-tab -->
						<?php endif; ?>
				</div><!-- /#tab-1 -->

				<div id="tab-2">
						<?php if(!empty($popularProduct)): ?>
						<div class="categories-product categories-product-tab">
								<div class="categories-product-list">
										<div class="clearfix">
												<?php
													foreach ($popularProduct as $item) {
														echo yii\base\View::render('//partials/productItem',array('product' => $item));
													}
												?>
										</div>
								</div><!-- /.categories-product-list -->
						</div><!-- /.category-product-tab -->
						<?php endif; ?>
				</div><!-- /#tab-2 -->

				<div id="tab-3">
						<?php if(!empty($saleProduct)): ?>
						<div class="categories-product categories-product-tab">
								<div class="categories-product-list">
										<div class="clearfix">
												<?php
													foreach ($saleProduct as $item) {
														echo yii\base\View::render('//partials/productItem',array('product' => $item));
													}
												?>
										</div>
								</div><!-- /.categories-product-list -->
						</div><!-- /.category-product-tab -->
						<?php endif; ?>
				</div><!-- /#tab-3 -->

		</div><!-- /.box-tab-content -->
</div><!-- /.box-tab -->

<div class="clear"></div>