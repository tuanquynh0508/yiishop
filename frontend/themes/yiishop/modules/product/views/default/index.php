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

<div class="box-1 margin-vertical-high-bottom">
		<div class="box-1-head grid_15"><h2>Chính sách bán hàng</h2></div>
		<div class="clear"></div>
		<div class="box-1-body clearfix">
				<div class="grid_3 box-1-body-item">
						<h3><i class="tq-icon tq-icon-24 tq-icon-shield"></i> Bảo mật thông tin</h3>
						<p>Thông tin khách hàng đăng ký trên YiiShop sẽ được bảo mật, không tiết lộ hay bán thông tin của khách hàng cho bên thứ ba.</p>
						<p><a href="#" class="link-under-base">Chi tiết</a></p>
				</div><!-- /.box-1-body-item -->
				<div class="grid_3 box-1-body-item">
						<h3><i class="tq-icon tq-icon-24 tq-icon-notify"></i> Cam kết bán hàng</h3>
						<p>Chúng tôi cam kết bán hàng có nguồn gốc xuất xứ rõ ràng. Chất lượng sản phẩm tốt nhất đến tay người tiêu dùng.</p>
						<p><a href="#" class="link-under-base">Chi tiết</a></p>
				</div><!-- /.box-1-body-item -->
				<div class="grid_3 box-1-body-item">
						<h3><i class="tq-icon tq-icon-24 tq-icon-pay"></i> Hướng dẫn thanh toán</h3>
						<p>Việc mua hàng online từ web site của chúng tôi hết sức thuận tiện và tin cậy. Thanh toán nhanh chóng và thuận tiện.</p>
						<p><a href="#" class="link-under-base">Chi tiết</a></p>
				</div><!-- /.box-1-body-item -->
				<div class="grid_3 box-1-body-item">
						<h3><i class="tq-icon tq-icon-24 tq-icon-ship"></i> Vận chuyển</h3>
						<p>Danh sách các địa điểm và cước giá vận chuyển nếu bạn sử dụng hình thức giao hàng đến tận nhà của chúng tôi.</p>
						<p><a href="#" class="link-under-base">Chi tiết</a></p>
				</div><!-- /.box-1-body-item -->
				<div class="grid_3 box-1-body-item">
						<h3><i class="tq-icon tq-icon-24 tq-icon-revert"></i> Đổi trả hàng</h3>
						<p>Chính sách đổi trả hàng áp dụng cho toàn bộ các khách hàng của chúng tôi. Những quy định đổi trả hàng được đăng tại đây.</p>
						<p><a href="#" class="link-under-base">Chi tiết</a></p>
				</div><!-- /.box-1-body-item -->
		</div>
</div><!-- /.box-1 -->
<?php $this->endBlock(); ?>