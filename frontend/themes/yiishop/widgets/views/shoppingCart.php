<?php 
use yii\web\View;
use yii\helpers\Html;

$baseUrl = Yii::$app->request->baseUrl;

$urlAdd = Yii::$app->urlManager->createUrl('product/cart/add');
$urlUpdate = Yii::$app->urlManager->createUrl('product/cart/add');
$urlDelete = Yii::$app->urlManager->createUrl('product/cart/add');
$csrf = Yii::$app->request->getCsrfToken();
//http://fancyapps.com/fancybox/
$this->registerJs("
$('#shoppingCartButton').fancybox({	
	fitToView	: false,
	width		: '800',
	height		: '500',
	autoSize	: false,
	closeClick	: false,
	openEffect	: 'none',
	closeEffect	: 'none'
	//modal: true,
});

$('.shopping-cart-list').ClassyScroll();

$('.btn-shopping-cart').click(function(e){
	e.preventDefault();
	addCart($(this).attr('data-id'));
});

////////////////////////////////////////////////////////////////////////////////
function addCart(productId) {
	var url = '$urlAdd';
	var data = {
		CartForm: {
			productId: productId,
			quantity: 1
		},
		_csrf: '$csrf'
	};
	var sendCB = function(){};
	var failCB = function(){};
	var successCB = function(data){
		refreshCart(data.product);
		$.simplyToast(data.message, 'success', {
			align: 'center',
			delay: 5000
		});
	};
	callService(url, 'POST', 'JSON', data, sendCB, successCB, failCB);
}

function updateCart(productId) {
	var url = '$urlUpdate';
	var data = {
		CartForm: {
			productId: productId,
			quantity: 1
		},
		_csrf: '$csrf'
	};
	var sendCB = function(){};
	var failCB = function(){};
	var successCB = function(data){
		refreshCart(data.product);
		$.simplyToast(data.message, 'success', {
			align: 'center',
			delay: 5000
		});
	};
	callService(url, 'POST', 'JSON', data, sendCB, successCB, failCB);
}

function deleteCart(productId) {
	var url = '$urlDelete';
	var data = {
		CartForm: {
			productId: productId,
			quantity: 1
		},
		_csrf: '$csrf'
	};
	var sendCB = function(){};
	var failCB = function(){};
	var successCB = function(data){
		refreshCart(null);
		$.simplyToast(data.message, 'warning', {
			align: 'center',
			delay: 5000
		});
	};
	callService(url, 'POST', 'JSON', data, sendCB, successCB, failCB);
}

function refreshCart(product) {
	if(typeof product !== 'undefined' && product !== null) {
		
	}
	
}
", View::POS_END);
?>

<a href="#shoppingCartPopup" id="shoppingCartButton" class="shooping-cart" data-tooltip="Trong giỏ hàng có <?= $totalProduct ?> sản phẩm."><span><?= $totalProduct ?></span></a>
<div id="shoppingCartPopupWrapper">
	<div class="shopping-cart-box" id="shoppingCartPopup">
			<div class="shopping-cart-table-row row-head">
				<ul class="clearfix">
					<li class="field-num"><div>STT</div></li>
					<li class="field-product"><div>Sản phẩm</div></li>
					<li class="field-price"><div>Đơn giá</div></li>
					<li class="field-quantity"><div>Số lượng</div></li>
					<li class="field-total-price"><div>Thành tiền</div></li>
				</ul>
			</div><!-- /.shopping-cart-table-row -->
			
			<div class="shopping-cart-list">
				<?php $totalPrice = 0; ?>
				<?php if(!empty($productList)): ?>
				<?php 
					$i=0; 
					foreach ($productList as $product): 
						$i++; 
						$url = Yii::$app->urlManager->createUrl(['product/default/detail', 'cateslug' =>$product->categories[0]->slug, 'slug' => $product->slug]);
						
						if($product->retail_price == 0) {
							$price = 0;
						} else if($product->getSalePrice() != 0) {
							$price = intval($product->getSalePrice());
						} else {
							$price = intval($product->retail_price);
						}
						
						$quantity = intval($cartList[$product->id]);
						$totalItemPrice = $price*$quantity;
						$totalPrice += $totalItemPrice;
				?>
				<div class="shopping-cart-table-row row-product" id="cartItem<?= $product->id ?>">
					<ul class="clearfix">
						<li class="field-num"><div class="text-center"><?= $i ?></div></li>
						<li class="field-product">
							<div>
								<div class="clearfix">
									<div class="pull-left" style="margin-right: 10px;width: 80px;overflow: hidden;">
										<a href="<?= $url ?>" title="<?= $product->title ?>">
											<?php echo Html::img($product->getDefaultImg('s'), ["height" => 60]); ?>
										</a>
									</div>
									<div class="pull-left">
										<p><a href="<?= $url ?>" class="color-grey-dard"><?= $product->title ?></a></p>
										<p><a href="#" class="color-warning">Xóa</a></p>
									</div>
								</div>								
							</div>
						</li>
						<li class="field-price" data-value="<?= $price ?>"><div><?= Yii::$app->utility->asCurrency($price) ?></div></li>
						<li class="field-quantity">
							<div class="text-center">
								<input type="number" class="text-box input-xsmall text-center" value="<?= $quantity ?>"/>
							</div>
						</li>
						<li class="field-total-price"><div><?= Yii::$app->utility->asCurrency($totalItemPrice) ?></div></li>
					</ul>
				</div><!-- /.shopping-cart-table-row -->
				<?php endforeach; ?>
				<?php endif; ?>
			</div><!-- /.shopping-cart-list -->
			
			<div class="shopping-cart-table-row row-footer">
				<ul class="clearfix">
					<li class="field-total-text">
						<div>
							<strong>Tổng tiền</strong><br/>
							(Chưa bao gồm phí vận chuyển)
						</div>
					</li>
					<li class="field-total-value"><div class="font-18 color-warning text-right margin-vertical-top"><?= Yii::$app->utility->asCurrency($totalPrice) ?></div></li>
				</ul>
			</div><!-- /.shopping-cart-table-row -->
			
			<p class="text-right" style="padding:10px;">
				<button type="button" class="btn btn-medium btn-base" onclick="$.fancybox.close();">
					<span class="tq-icon tq-icon-32 tq-icon-white-cart-32"></span>
					Tiếp tục mua hàng
				</button>
				<button type="button" class="btn btn-medium btn-active">
					<span class="tq-icon tq-icon-32 tq-icon-credit"></span>
					Đặt hàng ngay
				</button>
			</p>
			
	</div><!-- /.shopping-cart-box -->
</div><!-- /#shoppingCartPopupWrapper -->