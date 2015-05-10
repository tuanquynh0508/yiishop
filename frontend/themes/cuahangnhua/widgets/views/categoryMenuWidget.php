<?php

use yii\widgets\Menu;
?>
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar" id="categoryMenu">
	<!-- sidebar menu: : style can be found in sidebar.less -->
	<?php
	//http://www.bsourcecode.com/yiiframework2/menu-widget-in-yii-framework-2-0/
	echo Menu::widget([
		'items' => $menuItems,
		'options' => [
			'class' => 'sidebar-menu',
			'data-tag' => 'yii2-menu',
		],
		'submenuTemplate' => "\n<ul class='treeview-menu'>\n{items}\n</ul>\n",
		'activeCssClass' => 'active',
		'activateParents' => true,
		'encodeLabels' => false,
	]);
	?>
</section>
<!-- /.sidebar -->