<?php
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Breadcrumbs;

$baseUrl = Yii::$app->request->baseUrl;

$this->title = $product->title;
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile($baseUrl.'/yiishop/js/jquery.carouFredSel.js', ['depends' => [\frontend\assets\YiishopAsset::className()]]);
$this->registerJsFile($baseUrl.'/yiishop/js/jquery.transit.min.js', ['depends' => [\frontend\assets\YiishopAsset::className()]]);
$this->registerJsFile($baseUrl.'/yiishop/js/jquery.tqTab.js', ['depends' => [\frontend\assets\YiishopAsset::className()]]);
$this->registerJsFile($baseUrl.'/yiishop/js/jquery.cookie.js', ['depends' => [\frontend\assets\YiishopAsset::className()]]);
$this->registerJsFile($baseUrl.'/yiishop/js/jquery.elevateZoom.min.js', ['depends' => [\frontend\assets\YiishopAsset::className()]]);
$this->registerJs("
$('.box-tab-1').tqTab({
	defaultTab: '#tab-1',
	useCookie: true,
	cookieId: 'yiishopProductDetailTab'
});
			
// PRODUCT THUMBNAIL
$('#boxProductThumbnailListWrapper').carouFredSel({
	circular: false,
	infinite: false,
	items: {
		visible: 6,
		width: 65,
		height: 60
	},
	scroll: {
		items: 1
	},
	circular: true,
	infinite: true,
	auto: false,
	prev: $('#thumbPrev'),
	next: $('#thumbNext')
});

$('#boxProductThumbnailShow').elevateZoom({
	gallery:'boxProductThumbnailList',
	cursor: 'pointer',
	galleryActiveClass: 'active',
	imageCrossfade: false,
	zoomWindowWidth: 570,
	borderSize: 1,
	borderColour: '#ddd'
	//loadingIcon: 'img/loading.gif'
});
", View::POS_END);
?>

<!-- zone-before-body======================================================= -->
<?php $this->beginBlock('zone-before-body'); ?>
<nav id="pageBreadcrumb" class="margin-vertical-bottom grid_15">
	<ul class="clearfix">
		<li><a href="#"><span>Trang chủ</span></a></li>
		<li><a href="#"><span>Danh mục 1</span></a></li>
		<li><span>Sản phẩm sẽ nằm ở đây</span></li>
	</ul>
</nav>

<div class="clear"></div>
<?php $this->endBlock(); ?>

<!-- zone-left-body========================================================= -->
<?php $this->beginBlock('zone-left-body'); ?>
<div class="clearfix margin-vertical-high-bottom">
	<div class="grid_5 alpha">
		<div id="boxProductThumbnail" class="margin-vertical-bottom">
			<img id="boxProductThumbnailShow" src="<?= $product->getDefaultImg('m') ?>" data-zoom-image="<?= $product->getDefaultImg('n') ?>"/>
			<span id="boxProductThumbnailZoom"></span>
		</div><!-- /#boxProductThumbnail -->

		<div id="boxProductThumbnailList">
			<div id="boxProductThumbnailListWrapper">
				<?php foreach($product->inputImgs as $key => $img): ?>
				<div class="boxProductThumbnail-Item">
					<a  href="#" class="elevatezoom-gallery" 
							data-image="<?= Yii::getAlias('@img_path/product/'.Yii::$app->params['upload_var']['medium']['prefix'].'/').$img->file ?>" 
							data-zoom-image="<?= Yii::getAlias('@img_path/product/'.Yii::$app->params['upload_var']['normal']['prefix'].'/').$img->file ?>">
						<img src="<?= Yii::getAlias('@img_path/product/'.Yii::$app->params['upload_var']['small']['prefix'].'/').$img->file ?>"/>
					</a>
				</div><!-- /.boxProductThumbnail-Item -->				
				<?php endforeach; ?>
			</div><!-- /#boxProductThumbnailListWrapper -->
			<a href="#" class="btn-link-img" id="thumbPrev"><span>Prev</span></a>
			<a href="#" class="btn-link-img" id="thumbNext"><span>Next</span></a>
		</div><!-- /#boxProductThumbnailList -->

	</div>
	<div class="grid_7 omega" id="boxProductDetail">
		<h1><?= $product->title ?></h1>
		<p>
			Mã sản phẩm: <span class="color-base"><?= $product->upc ?></span> |
			Lượt xem: <span class="color-base"><?= $product->views ?></span> |
			Cập nhật: <span class="color-base"><?= $product->updated_at ?></span>
		</p>

		<hr/>

		<ul id="boxProductDetailFeature" class="clearfix">
			<?php /* <li>Bảo hành: 12 tháng</li> */ ?>
			<li>Thương hiệu: <?= $product->firm->title ?></li>
			<li>Xuất xứ: <?= $product->getFullMade() ?></li>
			
			<?php
				$listOptions = $product->getListOptionsGroup();
				if(!empty($listOptions->group)):
				foreach ($listOptions->group as $optionGroup):
			?>
			<li<?= ($optionGroup->option_type == 'color')?' class="box-color-feature"':'' ?>><?= $optionGroup->title ?>: 
				<?php
					$arrayOption = array();
					$sperator = ", ";
					foreach ($listOptions->options[$optionGroup->id] as $option) {
						if($optionGroup->option_type == 'color') {
							$arrayOption[] = '<span style="background-color:'.$option->title.';"> </span>';
							$sperator = "&nbsp;";
						} else {
							$arrayOption[] = $option->title.': '.$listOptions->values[$optionGroup->id.'-'.$option->id];
						}
					}
					echo implode($sperator, $arrayOption);
				?>
			</li>
			<?php
				endforeach;
				endif;
			?>
		</ul>

		<div class="clear margin-vertical-bottom"></div>

		<div class="clearfix">
			<div class="pull-left w-50p">
				<?php if($product->retail_price == 0): ?>
					<p>Giá bán: <span class="color-warning font-30">Liên hệ</span></p>
				<?php else: ?>
					<?php if($product->getSalePrice() != 0): ?>
					<p>Giá bán: <span class="color-warning font-30"><?= $product->getSalePrice() ?> <u>đ</u></span></p>
					<p class="color-grey-high">Giá cũ: <span class="text-cross"><?= $product->retail_price ?> <u>đ</u></span></p>
					<?php else: ?>
					<p>Giá bán: <span class="color-warning font-30"><?= $product->retail_price ?> <u>đ</u></span></p>
					<?php endif; ?>
				<?php endif; ?>
				
				<?php if($product->out_of_stock == 0): ?>
          <p><span class="tq-icon tq-icon-16 tq-icon-instock"></span></p>
        <?php else: ?>
          <p><span class="tq-icon tq-icon-16 tq-icon-outstock"></span></p>
        <?php endif; ?>
				
				<p><span class="tq-icon tq-icon-24 tq-icon-ship"></span> Ship hàng toàn quốc</p>
				<p>
					<button type="button" class="btn btn-medium btn-base">
						<span class="tq-icon tq-icon-32 tq-icon-white-cart-32"></span>
						Cho vào giỏ hàng
					</button>
					<a href="#" class="font-12 color-grey-dard">Hướng dẫn</a>
				</p>
			</div>
			<div class="pull-left w-50p">
				<div class="contact-box">
					<ul>
						<li><span class="tq-icon tq-icon-24 tq-icon-phone"></span> <span class="font-24 font-bold color-grey-dard align-middle">0903258221</span></li>
						<li><span class="tq-icon tq-icon-24 tq-icon-phone"></span> <span class="font-24 font-bold color-grey-dard align-middle">0903258221</span></li>
					</ul>
				</div><!-- /.contact-box -->
			</div>
		</div>
	</div>
</div>

<div class="box-tab box-tab-1 margin-vertical-bottom">
	<div class="box-tab-head border-top">
		<ul class="clearfix">
			<li class="active"><a href="#tab-1">Thông tin sản phẩm</a></li>
			<li><a href="#tab-2">Khách hàng đánh giá</a></li>
		</ul>
	</div><!-- /.box-tab-head -->
	<div class="box-tab-content">
		<div id="tab-1">		
			<?= $product->description ?>
		</div><!-- /#tab-1 -->
		<div id="tab-2">
			Tab 2
		</div><!-- /#tab-2 -->
	</div><!-- /.box-tab-content -->
</div><!-- /.box-tab -->

<div class="box-1 margin-vertical-high-bottom">
	<div class="box-1-head"><h2>Sản phẩm vừa xem</h2></div>
	<div class="clear"></div>
	<div class="box-1-body clearfix">

		<div class="categories-product categories-product-for-cate">
			<div class="categories-product-list">
				<div class="clearfix">
					<div class="categories-product-item">
						<div class="categories-product-item-warpper">
							<span class="sale-price">10%</span>
							<div class="categories-product-item-thumb">
								<a href="#" title=""><img src="img/nopicture.jpg"/></a>
							</div>
							<div class="categories-product-item-text">
								<p><a href="#" class="font-16 color-grey-dard">universal multifunction charger cable connectors with usb port</a></p>
							</div>
							<div class="categories-product-item-button">
								<p class="font-18">
									<strong><span class="color-red-dard">63000 <u>đ</u></span></strong>
									<span class="color-grey-high">(<span class="text-cross">65000 <u>đ</u></span>)</span>
								</p>
								<p><span class="tq-icon tq-icon-16 tq-icon-instock"></span></p>
								<button class="btn btn-shopping-cart"><span>Cho vào giỏ hàng</span></button>
							</div>
						</div><!-- /.categories-product-item-warpper -->
					</div><!-- /.categories-product-item -->
					<div class="categories-product-item">
						<div class="categories-product-item-warpper">
							<div class="categories-product-item-thumb">
								<img src="img/nopicture.jpg"/>
							</div>
							<div class="categories-product-item-text">
								<p><a href="#" class="font-16 color-grey-dard">universal multifunction charger cable connectors with usb port</a></p>
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
					<div class="categories-product-item">
						<div class="categories-product-item-warpper">
							<div class="categories-product-item-thumb">
								<img src="img/nopicture.jpg"/>
							</div>
							<div class="categories-product-item-text">
								<p><a href="#" class="font-16 color-grey-dard">universal multifunction charger cable connectors with usb port</a></p>
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
					<div class="categories-product-item">
						<div class="categories-product-item-warpper">
							<div class="categories-product-item-thumb">
								<img src="img/nopicture.jpg"/>
							</div>
							<div class="categories-product-item-text">
								<p><a href="#" class="font-16 color-grey-dard">universal multifunction charger cable connectors with usb port</a></p>
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
					<div class="categories-product-item">
						<div class="categories-product-item-warpper">
							<div class="categories-product-item-thumb">
								<img src="img/nopicture.jpg"/>
							</div>
							<div class="categories-product-item-text">
								<p><a href="#" class="font-16 color-grey-dard">universal multifunction charger cable connectors with usb port</a></p>
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
					<div class="categories-product-item">
						<div class="categories-product-item-warpper">
							<div class="categories-product-item-thumb">
								<img src="img/nopicture.jpg"/>
							</div>
							<div class="categories-product-item-text">
								<p><a href="#" class="font-16 color-grey-dard">universal multifunction charger cable connectors with usb port</a></p>
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
					<div class="categories-product-item">
						<div class="categories-product-item-warpper">
							<div class="categories-product-item-thumb">
								<img src="img/nopicture.jpg"/>
							</div>
							<div class="categories-product-item-text">
								<p><a href="#" class="font-16 color-grey-dard">universal multifunction charger cable connectors with usb port</a></p>
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
					<div class="categories-product-item">
						<div class="categories-product-item-warpper">
							<div class="categories-product-item-thumb">
								<img src="img/nopicture.jpg"/>
							</div>
							<div class="categories-product-item-text">
								<p><a href="#" class="font-16 color-grey-dard">universal multifunction charger cable connectors with usb port</a></p>
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
				</div>
			</div><!-- /.categories-product-list -->
		</div><!-- /.category-product-item -->

	</div>
</div><!-- /.box-1 -->
<?php $this->endBlock(); ?>

<!-- zone-right-body======================================================== -->
<?php $this->beginBlock('zone-right-body'); ?>
<div class="small-box-1 margin-vertical-bottom">
	<div class="small-box-1-head">
		<h3>Sản phẩm gợi ý</h3>
	</div><!-- /.small-box-1-head -->
	<div class="small-box-1-content">
		<hr/>
		<div class="categories-product categories-product-for-releated">
			<div class="categories-product-list">
				<div class="clearfix">
					<div class="categories-product-item">
						<div class="categories-product-item-warpper">
							<span class="sale-price">10%</span>
							<div class="categories-product-item-thumb">
								<a href="#" title=""><img src="img/nopicture.jpg"/></a>
							</div>
							<div class="categories-product-item-text">
								<p><a href="#" class="font-12 color-grey-dard">universal multifunction charger cable connectors with usb port</a></p>
								<p class="font-14">
									<strong><span class="color-red-dard">63000 <u>đ</u></span></strong>
									<span class="color-grey-high">(<span class="text-cross">65000 <u>đ</u></span>)</span>
								</p>
								<p><span class="tq-icon tq-icon-16 tq-icon-instock"></span></p>
							</div>
							<div class="categories-product-item-button">
								<button class="btn btn-shopping-cart"><span>Cho vào giỏ hàng</span></button>
							</div>
						</div><!-- /.categories-product-item-warpper -->
					</div><!-- /.categories-product-item -->
					<div class="categories-product-item">
						<div class="categories-product-item-warpper">
							<span class="sale-price">10%</span>
							<div class="categories-product-item-thumb">
								<a href="#" title=""><img src="img/nopicture.jpg"/></a>
							</div>
							<div class="categories-product-item-text">
								<p><a href="#" class="font-12 color-grey-dard">universal multifunction charger cable connectors with usb port</a></p>
								<p class="font-14">
									<strong><span class="color-red-dard">63000 <u>đ</u></span></strong>
									<span class="color-grey-high">(<span class="text-cross">65000 <u>đ</u></span>)</span>
								</p>
							</div>
							<div class="categories-product-item-button">
								<button class="btn btn-shopping-cart"><span>Cho vào giỏ hàng</span></button>
							</div>
						</div><!-- /.categories-product-item-warpper -->
					</div><!-- /.categories-product-item -->
					<div class="categories-product-item">
						<div class="categories-product-item-warpper">
							<span class="sale-price">10%</span>
							<div class="categories-product-item-thumb">
								<a href="#" title=""><img src="img/nopicture.jpg"/></a>
							</div>
							<div class="categories-product-item-text">
								<p><a href="#" class="font-12 color-grey-dard">universal multifunction charger cable connectors with usb port</a></p>
								<p class="font-14">
									<strong><span class="color-red-dard">63000 <u>đ</u></span></strong>
									<span class="color-grey-high">(<span class="text-cross">65000 <u>đ</u></span>)</span>
								</p>
							</div>
							<div class="categories-product-item-button">
								<button class="btn btn-shopping-cart"><span>Cho vào giỏ hàng</span></button>
							</div>
						</div><!-- /.categories-product-item-warpper -->
					</div><!-- /.categories-product-item -->
					<div class="categories-product-item">
						<div class="categories-product-item-warpper">
							<span class="sale-price">10%</span>
							<div class="categories-product-item-thumb">
								<a href="#" title=""><img src="img/nopicture.jpg"/></a>
							</div>
							<div class="categories-product-item-text">
								<p><a href="#" class="font-12 color-grey-dard">universal multifunction charger cable connectors with usb port</a></p>
								<p class="font-14">
									<strong><span class="color-red-dard">63000 <u>đ</u></span></strong>
									<span class="color-grey-high">(<span class="text-cross">65000 <u>đ</u></span>)</span>
								</p>
							</div>
							<div class="categories-product-item-button">
								<button class="btn btn-shopping-cart"><span>Cho vào giỏ hàng</span></button>
							</div>
						</div><!-- /.categories-product-item-warpper -->
					</div><!-- /.categories-product-item -->
					<div class="categories-product-item">
						<div class="categories-product-item-warpper">
							<span class="sale-price">10%</span>
							<div class="categories-product-item-thumb">
								<a href="#" title=""><img src="img/nopicture.jpg"/></a>
							</div>
							<div class="categories-product-item-text">
								<p><a href="#" class="font-12 color-grey-dard">universal multifunction charger cable connectors with usb port</a></p>
								<p class="font-14">
									<strong><span class="color-red-dard">63000 <u>đ</u></span></strong>
									<span class="color-grey-high">(<span class="text-cross">65000 <u>đ</u></span>)</span>
								</p>
							</div>
							<div class="categories-product-item-button">
								<button class="btn btn-shopping-cart"><span>Cho vào giỏ hàng</span></button>
							</div>
						</div><!-- /.categories-product-item-warpper -->
					</div><!-- /.categories-product-item -->
				</div>
			</div><!-- /.categories-product-list -->
		</div><!-- /.category-product-item -->

	</div><!-- /.small-box-1-content -->
</div><!-- /.small-box-1 -->
<?php $this->endBlock(); ?>