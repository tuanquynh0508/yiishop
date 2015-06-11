<?php
use yii\helpers\Html;
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
												<?php foreach ($newProducts as $item): ?>
												<div class="categories-product-item">
														<div class="categories-product-item-warpper">
																<?php if($item->getSalePrice() != 0): ?>
																<span class="sale-price">0%</span>
																<?php endif; ?>
																<div class="categories-product-item-thumb">
																		<a href="<?= Yii::$app->urlManager->createUrl(['product/default/detail', 'slug' => $item->slug]) ?>" title="<?= $item->title ?>">
																				<?php echo Html::img($item->getDefaultImg('m'), []); ?>
																		</a>
																</div>
																<div class="categories-product-item-text">
																		<p>
																			<a href="<?= Yii::$app->urlManager->createUrl(['product/default/detail', 'slug' => $item->slug]) ?>" class="font-16 color-grey-dard">
																				<?= $item->title ?>
																			</a>
																		</p>
																		<p class="font-18">
																				<strong><span class="color-red-dard">63000 <u>đ</u></span></strong>
																				<span class="color-grey-high">(<span class="text-cross">65000 <u>đ</u></span>)</span>
																		</p>
																</div>
																<div class="categories-product-item-button">
																		<button class="btn btn-shopping-cart"><span>Cho vào giỏ hàng</span></button>
																</div>
														</div><!-- /.categories-product-item-warpper -->
												</div><!-- /.categories-product-item -->
												<?php endforeach; ?>
										</div>
								</div><!-- /.categories-product-list -->
						</div><!-- /.category-product-tab -->
						<?php endif; ?>
				</div><!-- /#tab-1 -->

				<div id="tab-2">
						Tab 2
				</div><!-- /#tab-2 -->

				<div id="tab-3">
						Tab 3
				</div><!-- /#tab-3 -->

		</div><!-- /.box-tab-content -->
</div><!-- /.box-tab -->

<div class="clear"></div>