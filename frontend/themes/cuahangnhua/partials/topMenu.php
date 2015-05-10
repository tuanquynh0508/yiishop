<?php
use yii\widgets\Menu;
//$baseUrl = Yii::$app->request->baseUrl;
?>
<nav class="navbar navbar-default" id="pageMenuTop">
	<div class="container-fluid">
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="navbar-collapse">
			<?php
				$activeMenu = array(
					"menu1" => Yii::$app->utility->getActiveMenu(
						array(
							array(Yii::$app->defaultRoute)
						)
					),
				);
				//http://www.bsourcecode.com/yiiframework2/menu-widget-in-yii-framework-2-0/
				echo Menu::widget([
				  'items' => [
					  ['label' => '<i class="fa fa-home"></i> <span>Trang chủ</span>', 'url' => Yii::$app->homeUrl, 'active'=>$activeMenu['menu1']],
					  ['label' => '<i class="fa fa-gift"></i> <span>Hướng dẫn mua hàng</span>', 'url' => ['/content/page/view','slug'=>'huong-dan-mua-hang']],
					  ['label' => '<i class="fa fa-credit-card"></i> <span>Thanh toán</span>', 'url' => ['/content/page/view','slug'=>'huong-dan-thanh-toan']],
					  ['label' => '<i class="fa fa-truck"></i> <span>Vận chuyển</span>', 'url' => ['/content/page/view','slug'=>'van-chuyen']],
					  ['label' => '<i class="fa fa-umbrella"></i> <span>Đổi hàng</span>', 'url' => ['/content/page/view','slug'=>'doi-tra-hang']],
					  ['label' => '<i class="fa fa-envelope"></i> <span>Liên hệ</span>', 'url' => ['/site/contact']],
				  ],
				  'options' => [
					'class' => 'nav navbar-nav',
					//'data-tag'=>'yii2-menu',
				  ],
				  //'submenuTemplate' => "\n<ul class='treeview-menu'>\n{items}\n</ul>\n",
				  'activeCssClass'=>'active',
				  'activateParents'=>true,
				  'encodeLabels' => false,
			  ]);
			?>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>