<?php
use yii\web\View;

$this->registerJs("
$(function () {

	$('.search-top .dropdown-menu li a').bind('click', function(e) {
		var parent = $(this).parent();

		$('.search-top .dropdown-menu li').removeClass('active');
		parent.addClass('active');
		activeSearchItem();
	});

	activeSearchItem();
});
function activeSearchItem() {
	var title = '';
	var id = 0;
	$('.search-top .dropdown-menu li').each(function(){
		if($(this).hasClass('active')) {
			title = $(this).find('a').text();
			id = $(this).find('a').attr('href').replace('#searchCategory', '');
		}
	});
	$('input[name=\"categoryId\"]').val(id);
	$('.search-top button span.btn-text').html(title);
}
", View::POS_END);
?>

<div id="shoppingCart">
	<span class="cart-text">Giỏ hàng có <span class="text-danger">0</span> <span class="text-success">sản phẩm</span></span>
</div>
<form action="<?= Yii::$app->urlManager->createUrl(['product/default/search']) ?>" method="get">
	<input type="hidden" name="categoryId" value="<?= $categoryId ?>"/>
<div class="input-group">
	<div class="input-group-btn search-top">
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="btn-text">Tất cả danh mục</span> <span class="caret"></span></button>
		<ul class="dropdown-menu" role="menu">
			<li<?= ($categoryId==0)?' class="active"':'' ?>><a href="#searchCategory0">Tất cả danh mục</a></li>
			<?php if(!empty($listCategory)): ?>
			<?php foreach ($listCategory as $category): ?>
			<li<?= ($categoryId==$category->id)?' class="active"':'' ?>><a href="#searchCategory<?php echo $category->id; ?>"><?php echo $category->title; ?></a></li>
			<?php endforeach; ?>
			<?php endif; ?>
		</ul>
	</div><!-- /btn-group -->
	<input type="text" class="form-control" name="keyword" placeholder="Từ khóa tìm kiếm..." value="<?= $keyword ?>"/>
	<span class="input-group-btn">
		<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Tìm kiếm</button>
	</span>
</div><!-- /input-group -->
</form>