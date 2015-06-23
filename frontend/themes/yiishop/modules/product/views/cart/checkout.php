<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Liên hệ đặt hàng';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- zone-before-body======================================================= -->
<?php $this->beginBlock('zone-before-body'); ?>
<?php echo yii\base\View::render('//partials/breadcrumbs',array('classCss' => 'margin-vertical-bottom grid_15')); ?>
<?php $this->endBlock(); ?>

<!-- zone-left-body========================================================= -->
<?php $this->beginBlock('zone-left-body'); ?>
<div class="page-header">
	<h1><?= Html::encode($this->title) ?></h1>
</div>

<div class="clearfix" id="checkoutBox">
	
	<div class="grid_5 alpha">
		<h2>Thông tin đặt hàng</h2>
	</div>
	
	<div class="grid_7 omega">
		<div id="cartCheckoutList">
			<h2>Đơn hàng của bạn</h2>
			<table class="tq-style-2">
				<thead>
					<tr>
						<th width="45%">Sản phẩm</th>
						<th width="5%" class="text-center" nowrap>Số lượng</th>
						<th width="25%" class="text-right">Đơn giá</th>
						<th width="25%" class="text-right">Thành tiền</th>
					</tr>
				</thead>
				<tbody>
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
					<tr>
						<td>
							<a href="<?= $url ?>" class="color-grey-dard" target="_blank"><?= $product->title ?></a>
						</td>
						<td class="text-center"><?= $quantity ?></td>
						<td class="text-right"><?= ($price!=0)?Yii::$app->utility->asCurrency($price):'Liên hệ' ?></td>
						<td class="text-right"><?= ($totalItemPrice!=0)?Yii::$app->utility->asCurrency($totalItemPrice):'Liên hệ' ?></td>
					</tr>
					<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
				<tfoot class="bg-warning">
					<tr>
						<td>
							<strong>Tổng tiền thanh toán [*]</strong><br/>
						</td>
						<td colspan="3" class="text-right">
							<strong class="color-red-dard font-18"><?= Yii::$app->utility->asCurrency($totalPrice) ?></strong>
						</td>
					</tr>
					<tr>
						<td>
							<strong>Số tiền viết bằng chữ</strong><br/>
						</td>
						<td colspan="3" class="text-right">
							<i><?= Yii::$app->utility->docSo($totalPrice) ?> đồng</i>
						</td>
					</tr>					
				</tfoot>
			</table>
			<p><i>(*) Chưa bao gồm phí vận chuyển</i></p>
		</div>
	</div>
	
</div>

<?php $this->endBlock(); ?>

<!-- zone-right-body======================================================== -->
<?php $this->beginBlock('zone-right-body'); ?>
<?php $this->endBlock(); ?>