<?php
use frontend\assets\YiishopAsset;
use yii\helpers\Html;
use yii\web\View;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

YiishopAsset::register($this);

$baseUrl = Yii::$app->request->baseUrl;

$this->registerJs("
$.scrollUp({scrollText: ''});

$('[data-tooltip!=\"\"]').qtip({
		content: {
			attr: 'data-tooltip'
		},
		position: {
			my: 'bottom center',
			at: 'top center'
		}
});
", View::POS_END);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title><?= Html::encode($this->title) ?></title>
		<?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
	</head>

	<body>
		<?php $this->beginBody() ?>
		<div class="container_15" id="pageWrapper">

			<header id="headerWrapper">

				<div id="topMenu" class="grid_15 text-right">
					<a href="#">Đăng ký</a> |
					<a href="#">Đăng nhập</a>
				</div><!-- /#topMenu -->

				<div id="topLogo" class="grid_15 margin-vertical-bottom">
					<a href="#" class="btn-link-img btn-logo"><span>Logo here</span></a>
				</div><!-- /#topLogo -->

				<div class="clear"></div>

				<div id="topSearch" class="clearfix margin-vertical-bottom">
					<div class="grid_3 dropdown-menu">
						<button type="button" class="btn btn-category dropdown-menu-show"><span>Danh mục sản phẩm</span></button>
						<div class="dropdown-items">
							<ul class="dropdown-menu-item">
								<li><a href="#">Danh mục 1</a>
									<div class="dropdown-sub-menu-wrapper">
										<div class="dropdown-sub-menu">
											<div class="clearfix">
												<div class="grid_3">
													<p><a href="#" class="dropdown-sub-menu-lv1">Sub menu 1</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.1</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.2</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.3</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.4</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.5</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.6</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.7</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.8</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.9</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.10</a></p>
												</div>
												<div class="grid_3">
													<p><a href="#" class="dropdown-sub-menu-lv1">Sub menu 2</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.1</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.2</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.3</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.4</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.5</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.6</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.7</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.8</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.9</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.10</a></p>
												</div>
											</div>
										</div>
									</div>
								</li><!-- /.menu-item -->
								<li><a href="#">Danh mục 2</a>
									<div class="dropdown-sub-menu-wrapper">
										<div class="dropdown-sub-menu">
											<div class="clearfix">
												<div class="grid_3">
													<p><a href="#" class="dropdown-sub-menu-lv1">Sub menu 2</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.1</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.2</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.3</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.4</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.5</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.6</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.7</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.8</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.9</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.10</a></p>
												</div>
											</div>
										</div>
									</div>
								</li><!-- /.menu-item -->
								<li><a href="#">Danh mục 3</a>
									<div class="dropdown-sub-menu-wrapper">
										<div class="dropdown-sub-menu">
											<div class="clearfix">
												<div class="grid_3">
													<p><a href="#" class="dropdown-sub-menu-lv1">Sub menu 3</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.1</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.2</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.3</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.4</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.5</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.6</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.7</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.8</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.9</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.10</a></p>
												</div>
											</div>
										</div>
									</div>
								</li><!-- /.menu-item -->
								<li><a href="#">Danh mục 4</a>
									<div class="dropdown-sub-menu-wrapper">
										<div class="dropdown-sub-menu">
											<div class="clearfix">
												<div class="grid_3">
													<p><a href="#" class="dropdown-sub-menu-lv1">Sub menu 4</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.1</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.2</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.3</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.4</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.5</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.6</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.7</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.8</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.9</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 1.10</a></p>
												</div>
											</div>
										</div>
									</div>
								</li><!-- /.menu-item -->
								<li><a href="#">Danh mục 5</a>
									<div class="dropdown-sub-menu-wrapper">
										<div class="dropdown-sub-menu">
											<div class="clearfix">
												<div class="grid_3">
													<p><a href="#" class="dropdown-sub-menu-lv1">Sub menu 5</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 5.1</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 5.2</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 5.3</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 5.4</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 5.5</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 5.6</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 5.7</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 5.8</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 5.9</a></p>
													<p><a href="#" class="dropdown-sub-menu-lv2">Sub menu 5.10</a></p>
												</div>
											</div>
										</div>
									</div>
								</li><!-- /.menu-item -->
							</ul>
						</div>
					</div>
					<div class="grid_12">
						<form action="" method="get">
							<div id="searchForm">
								<button type="submit" class="btn btn-search"><span>Tìm kiếm</span></button>
								<input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm" class="input-form" />
							</div>
						</form>
					</div>
				</div><!-- /#topSearch -->

				<div class="grid_15 margin-vertical-bottom">
					<a href="#"><?php echo Html::img($baseUrl . '/yiishop/img/top-banner.png', []); ?></a>
				</div>
				<div class="clear"></div>

			</header><!-- /#headerWrapper -->

			<?= $content ?>

		</div><!-- /#pageWrapper -->

		<footer id="footerWrapper">
			<hr/>
			<p><strong>YiiShop</strong></p>
			<p><strong>Địa chỉ:</strong> 52, Bà Triệu, Phường Nguyễn Trãi, Quận Hà Đông, Hà Nội</p>
			<p>
				<strong>Điện thoại:</strong> 0903258221 -
				<strong>Email:</strong> <a href="mailto: tuanquynh0508@gmail.com">tuanquynh0508@gmail.com</a>
			</p>
			<p>
				<strong>
					<a href="#">Giới thiệu</a> -
					<a href="#">Thỏa thuận dịch vụ</a> -
					<a href="#">Tin tức</a> -
					<a href="#">Tuyển dụng</a>
				</strong>
			</p>
			<p><strong>&copy; <?php echo date('Y'); ?> YiiShop. All rights reserved.</strong> Edit by <a href="#" target="_blank">i-designer.net</a></p>
			<p><?php echo Html::img($baseUrl . '/yiishop/img/register-shop.png', []); ?></p>
		</footer><!-- /#footerWrapper -->

		<a href="#" class="shooping-cart"><span>100</span></a>

		<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>