<?php
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\LinkPager;

$baseUrl = Yii::$app->request->baseUrl;

$this->title = $category->title;
if($category->getParentName() != '') {
	$this->params['breadcrumbs'][] = ['label' => $category->getParentName(), 'url' => ['/product/default/category', 'cateslug' => $category->parent->slug]];
}
$this->params['breadcrumbs'][] = ['label' => $category->title, 'url' => ['/product/default/category', 'cateslug' => $category->slug]];
$this->params['breadcrumbs'][] = $totalItem.' Sản phẩm';

$this->registerJs("
//Firm Search Initial
$('#firmBoxSearch input[type=\"checkbox\"]').click(function(){
	$('#firmBoxSearchButton').show();
});
$('#firmBoxSearchButtonCancel').click(function(e){
	e.preventDefault();
	$('#firmBoxSearchButton').hide();
});
", View::POS_END);
?>

<!-- zone-left-body========================================================= -->
<?php $this->beginBlock('zone-left-body'); ?>
<div class="small-box-1 margin-vertical-bottom">
	<div class="small-box-1-head">
		<h3>Tìm theo hãng</h3>
	</div><!-- /.small-box-1-head -->
	<div class="small-box-1-content">
		<div id="firmBoxSearch">
			<p class="color-grey-dard">
				<input type="checkbox" name="firm[]" value="" /> Tên công ty ở đây
				<span class="color-grey-high">(43)</span>
			</p>
			<p class="color-grey-dard">
				<input type="checkbox" name="firm[]" value="" /> Tên công ty ở đây
				<span class="color-grey-high">(43)</span>
			</p>
			<p class="color-grey-dard">
				<input type="checkbox" name="firm[]" value="" /> Tên công ty ở đây
				<span class="color-grey-high">(43)</span>
			</p>
			<p class="color-grey-dard">
				<input type="checkbox" name="firm[]" value="" /> Tên công ty ở đây
				<span class="color-grey-high">(43)</span>
			</p>
			<p class="color-grey-dard">
				<input type="checkbox" name="firm[]" value="" /> Tên công ty ở đây
				<span class="color-grey-high">(43)</span>
			</p>
			<p class="color-grey-dard">
				<input type="checkbox" name="firm[]" value="" /> Tên công ty ở đây
				<span class="color-grey-high">(43)</span>
			</p>
			<p class="color-grey-dard">
				<input type="checkbox" name="firm[]" value="" /> Tên công ty ở đây
				<span class="color-grey-high">(43)</span>
			</p>
			<p class="color-grey-dard">
				<input type="checkbox" name="firm[]" value="" /> Tên công ty ở đây
				<span class="color-grey-high">(43)</span>
			</p>
			<p class="color-grey-dard">
				<input type="checkbox" name="firm[]" value="" /> Tên công ty ở đây
				<span class="color-grey-high">(43)</span>
			</p>
			<p class="color-grey-dard">
				<input type="checkbox" name="firm[]" value="" /> Tên công ty ở đây
				<span class="color-grey-high">(43)</span>
			</p>
		</div>
		<div id="firmBoxSearchButton">
			<button type="button" class="btn btn-xsmall btn-active">Tìm kiếm</button>
			<a href="#" id="firmBoxSearchButtonCancel" class="color-grey-dard">Bỏ qua</a>
		</div>
	</div><!-- /.small-box-1-content -->
</div><!-- /.small-box-1 -->

<div class="small-box-1 margin-vertical-bottom">
	<div class="small-box-1-head">
		<h3>Tìm theo màu sắc</h3>
	</div><!-- /.small-box-1-head -->
	<div class="small-box-1-content">
		<div id="colorBoxSearch">
			<span class="active" style="background-color: #ddd;"></span>
			<span style="background-color: #ddd;"></span>
			<span style="background-color: #ddd;"></span>
			<span style="background-color: #ddd;"></span>
			<span style="background-color: #ddd;"></span>
			<span style="background-color: #ddd;"></span>
			<span style="background-color: #ddd;"></span>
			<span style="background-color: #ddd;"></span>
			<span style="background-color: #ddd;"></span>
			<span style="background-color: #ddd;"></span>
			<span style="background-color: #ddd;"></span>
			<span style="background-color: #ddd;"></span>
			<span style="background-color: #ddd;"></span>
			<span style="background-color: #ddd;"></span>
		</div>
	</div><!-- /.small-box-1-content -->
</div><!-- /.small-box-1 -->

<div class="small-box-1 margin-vertical-bottom">
	<div class="small-box-1-head">
		<h3>Tìm theo giá</h3>
	</div><!-- /.small-box-1-head -->
	<div class="small-box-1-content">
		<div id="priceBoxSearch">
			<p><input type="radio" name="price" value="100K-500K" /> Giá từ 100.000 <u>đ</u> - 500.000 <u>đ</u> </p>
			<p><input type="radio" name="price" value="500K-1M" /> Giá từ 500.000 <u>đ</u> - 1.000.000 <u>đ</u></p>
			<p><input type="radio" name="price" value="1M-52" /> Giá từ 1.000.000 <u>đ</u> - 2.000.000 <u>đ</u></p>
			<p><input type="radio" name="price" value="2M-5M" /> Giá từ 2.000.000 <u>đ</u> - 5.000.000 <u>đ</u></p>
			<p><input type="textbox" class="input-xsmall" name="priceFrom" placeholder="VND" value="" /> đến</p>
			<p>
				<input type="textbox" class="input-xsmall" name="priceTo" placeholder="VND" value="" />
				<button type="button" class="btn btn-xsmall btn-primary">Tìm</button>
			</p>
		</div>
	</div><!-- /.small-box-1-content -->
</div><!-- /.small-box-1 -->
<?php $this->endBlock(); ?>

<!-- zone-right-body======================================================== -->
<?php $this->beginBlock('zone-right-body'); ?>
<?php echo yii\base\View::render('//partials/breadcrumbs',array('classCss' => 'margin-vertical-bottom grid_15')); ?>

<?php if(!empty($products)): ?>
<div id="productFilter" class="clearfix margin-vertical-bottom box-2">
	<div class="pull-left btn-view-box">
		<a href="#" class="btn-link-img btn-view-thumb active" data-tooltip="Xem dạng Thumbnail"><span>Dạng Thumbnail</span></a>
		<a href="#" class="btn-link-img btn-view-list" data-tooltip="Xem dạng List"><span>Dạng list</span></a>
	</div>
	<div class="pull-right">
		<strong>Sắp xếp:</strong>
		<select name="sort">
			<option value="">Theo tên từ A-Z</option>
			<option value="">Theo tên từ Z-A</option>
			<option value="">Theo giá tăng dần</option>
			<option value="">Theo giá giảm dần</option>
		</select>
	</div>
</div>

<div class="categories-product categories-product-for-cate">
	<div class="categories-product-list">
		<div class="clearfix">
			<?php
				foreach ($products as $item) {
					echo yii\base\View::render('//partials/productItem',array('product' => $item));
				}
			?>
		</div>
	</div><!-- /.categories-product-list -->
</div><!-- /.category-product -->
<?php else: ?>
<p class="color-grey-dard">Đang cập nhật</p>
<?php endif; ?>

<div class="clearfix">
	<div class="pull-left"></div>
	<div class="pull-right">		
		<div id="paginationBox">
			<?= LinkPager::widget([
				'pagination' => $pagination,
			]); ?>
		</div><!-- /#paginationBox -->
	</div>
</div>
<?php $this->endBlock(); ?>