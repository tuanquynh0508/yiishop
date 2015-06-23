<?php 
use yii\web\View;
use yii\helpers\Html;

$baseUrl = Yii::$app->request->baseUrl;

$urlCheckout = Yii::$app->urlManager->createUrl('product/cart/checkout');
$urlAdd = Yii::$app->urlManager->createUrl('product/cart/add');
$urlUpdate = Yii::$app->urlManager->createUrl('product/cart/update');
$urlDelete = Yii::$app->urlManager->createUrl('product/cart/delete');
$csrf = Yii::$app->request->getCsrfToken();

$this->registerJsFile($baseUrl.'/yiishop/js/jquery.numeric.min.js', ['depends' => [\frontend\assets\YiishopAsset::className()]]);
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

$('.btn-shopping-cart, .btn-detail-add-cart').click(function(e){
	e.preventDefault();
	addCart($(this).attr('data-id'));
});

$(document).on('click','.btn-delete-cart',function(e){
	e.preventDefault();
	if(confirm('Bạn có muốn xóa sản phẩm khỏi giỏ hàng không?.'))
	{
		deleteCart($(this).attr('data-id'));
	}
});

$(document).on('propertychange change keyup keydown paste input', '.shopping-cart-list .shopping-cart-table-row .field-quantity input', function(){
	if (this.value != this.value.replace(/[^0-9]/g, '')) {
    this.value = this.value.replace(/[^0-9]/g, '');
  }	
	var quantity = $(this).val();
	var productId = $(this).attr('data-id');
	updateCart(productId, quantity);
});

$('.shopping-cart-list .shopping-cart-table-row .field-quantity input').numeric();

////////////////////////////////////////////////////////////////////////////////
function gotoCheckout() {
	window.location.href = '$urlCheckout';
}

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
		addProduct(data.product);
		refreshCart();
		$.simplyToast(data.message, 'success', {
			align: 'center',
			delay: 5000
		});
	};
	callService(url, 'POST', 'JSON', data, sendCB, successCB, failCB);
}

function updateCart(productId, quantity) {
	var url = '$urlUpdate';
	var data = {
		CartForm: {
			productId: productId,
			quantity: quantity
		},
		_csrf: '$csrf'
	};
	var sendCB = function(){};
	var failCB = function(){};
	var successCB = function(data){
		addProduct(data.product);
		refreshCart();
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
		deleteProduct(data.product);
		refreshCart();
		$.simplyToast(data.message, 'warning', {
			align: 'center',
			delay: 5000
		});
	};
	callService(url, 'POST', 'JSON', data, sendCB, successCB, failCB);
}

function refreshCart() {
	var totalQuantity = 0;
	var totalPrice = 0;
	
	$('.shopping-cart-list .shopping-cart-table-row .field-quantity input').each(function(){
		totalQuantity += parseInt($(this).val());
	});
	
	$('.shopping-cart-list .shopping-cart-table-row .field-total-price').each(function(){
		console.log($(this).attr('data-value'));
		totalPrice += parseInt($(this).attr('data-value'));
	});
	
	$('#shoppingCartButton > span').html(totalQuantity);

	$('.field-total-number').html(totalPrice.asCurrency());
	$('.field-total-string i').html(totalPrice.docSo() + ' đồng');
}

function deleteProduct(product) {
	if($('#cartItem'+product.id).length > 0) {
		$('#cartItem'+product.id).remove();
	}
}

function addProduct(product) {
	if(typeof product === 'undefined' || product === null) {
		return false;
	}
	
	if($('#cartItem'+product.id).length > 0) {
		$('#cartItem'+product.id+' .field-quantity input').val(product.quantity);
		$('#cartItem'+product.id+' .field-price').attr('data-value', product.price);
		$('#cartItem'+product.id+' .field-price > div').html(((product.price!=0)?product.price.asCurrency():'Liên hệ'));
		$('#cartItem'+product.id+' .field-total-price').attr('data-value', product.totalPrice);
		$('#cartItem'+product.id+' .field-total-price > div').html(((product.totalPrice!=0)?product.totalPrice.asCurrency():'Liên hệ'));
		return false;
	}
	
	var html = '';
	html += '<div class=\"shopping-cart-table-row row-product\" id=\"cartItem' + product.id + '\">';
	html += '	<ul class=\"clearfix\">';
	html += '		<li class=\"field-num\"><div class=\"text-center\">1</div></li>';
	html += '		<li class=\"field-product\">';
	html += '			<div>';
	html += '				<div class=\"clearfix\">';
	html += '					<div class=\"pull-left\" style=\"margin-right: 10px;width: 80px;overflow: hidden;\">';
	html += '						<a href=\"' + product.url + '\" title=\"' + product.title + '\">';
	html += '							<img src=\"' + product.thumb + '\" height=\"60\" alt=\"\">';
	html += '						</a>';
	html += '					</div>';
	html += '					<div class=\"pull-left\">';
	html += '						<p><a href=\"' + product.url + '\" class=\"color-grey-dard\">' + product.title + '</a></p>';
	html += '						<p><a href=\"#\" class=\"color-warning btn-delete-cart\" data-id=\"' + product.id + '\">Xóa</a></p>';
	html += '					</div>';
	html += '				</div>';
	html += '			</div>';
	html += '		</li>';
	html += '		<li class=\"field-price\" data-value=\"' + product.price + '\"><div>' + ((product.price!=0)?product.price.asCurrency():'Liên hệ') + '</div></li>';
	html += '		<li class=\"field-quantity\">';
	html += '			<div class=\"text-center\">';
	html += '				<input type=\"number\" class=\"text-box input-xsmall text-center\" data-id=\"' + product.id + '\" value=\"' + product.quantity + '\">';
	html += '			</div>';
	html += '		</li>';
	html += '		<li class=\"field-total-price\" data-value=\"' + product.totalPrice + '\"><div>' + ((product.totalPrice!=0)?product.totalPrice.asCurrency():'Liên hệ') + '</div></li>';
	html += '	</ul>';
	html += '</div>';
	
	$('.shopping-cart-list').append(html);
	$('.shopping-cart-list .shopping-cart-table-row .field-quantity input').numeric();
}
", View::POS_END);
?>

<a href="#shoppingCartPopup" id="shoppingCartButton" class="shooping-cart" data-tooltip="Click vào đây để xem giỏ hàng của bạn."><span><?= $totalProduct ?></span></a>
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
										<p><a href="#" class="color-warning btn-delete-cart" data-id="<?= $product->id ?>">Xóa</a></p>
									</div>
								</div>								
							</div>
						</li>
						<li class="field-price" data-value="<?= $price ?>"><div><?= ($price!=0)?Yii::$app->utility->asCurrency($price):'Liên hệ' ?></div></li>
						<li class="field-quantity">
							<div class="text-center">
								<input type="number" class="text-box input-xsmall text-center" data-id="<?= $product->id ?>" value="<?= $quantity ?>"/>
							</div>
						</li>
						<li class="field-total-price" data-value="<?= $totalItemPrice ?>"><div><?= ($totalItemPrice!=0)?Yii::$app->utility->asCurrency($totalItemPrice):'Liên hệ' ?></div></li>
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
					<li class="field-total-value">
						<div class="text-right">
							<p class="font-18 color-warning field-total-number"><?= Yii::$app->utility->asCurrency($totalPrice) ?></p>
							<p class="field-total-string">(<i><?= Yii::$app->utility->docSo($totalPrice) ?> đồng</i>)</p>
						</div>
					</li>
				</ul>
			</div><!-- /.shopping-cart-table-row -->
			
			<p class="text-right" style="padding:10px;">
				<button type="button" class="btn btn-medium btn-base" onclick="$.fancybox.close();">
					<span class="tq-icon tq-icon-32 tq-icon-white-cart-32"></span>
					Tiếp tục mua hàng
				</button>
				<button type="button" class="btn btn-medium btn-active" onclick="gotoCheckout();">
					<span class="tq-icon tq-icon-32 tq-icon-credit"></span>
					Đặt hàng ngay
				</button>
			</p>
			
	</div><!-- /.shopping-cart-box -->
</div><!-- /#shoppingCartPopupWrapper -->