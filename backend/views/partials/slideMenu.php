<?php
use yii\widgets\Menu;

$baseUrl = Yii::$app->request->baseUrl;
?>
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo $baseUrl; ?>/adminlte/dist/img/user.png" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p><?php echo Yii::$app->user->identity->fullname; ?></p>

        <a href="#"><i class="fa fa-circle text-success"></i> Đăng nhập</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <?php
      http://www.bsourcecode.com/yiiframework2/menu-widget-in-yii-framework-2-0/
      echo Menu::widget([
        'items' => [
            ['label' => '<i class="fa fa-dashboard"></i> <span>Trang chủ</span>', 'url' => ['/site/index'],
              'options' => [
                'class' => 'treeview',
              ],
            ],
            ['label' => '<i class="fa fa-cube"></i> <span>Sản phẩm</span>', 'url' => ['/product/default/index'], 'items' => [
				['label' => '<i class="fa fa-caret-right"></i> Sản phẩm', 'url' => ['/product/default/index']],
                ['label' => '<i class="fa fa-caret-right"></i> Danh mục sản phẩm', 'url' => ['/product/category/index']],
				['label' => '<i class="fa fa-caret-right"></i> Hãng sản xuất', 'url' => ['/product/firm/index']],
				['label' => '<i class="fa fa-caret-right"></i> Giảm giá', 'url' => ['/product/sale/index']],
				['label' => '<i class="fa fa-caret-right"></i> Thuộc tính', 'url' => ['/product/option/index']],
              ],
              'options' => [
                'class' => 'treeview',
              ],
              'template' => '<a href="{url}">{label} <i class="fa fa-angle-left pull-right"></i></a>',
            ],
            ['label' => '<i class="fa fa-user"></i> <span>Khách hàng</span>', 'url' => ['product/index'], 'items' => [
                ['label' => '<i class="fa fa-caret-right"></i> Đơn hàng', 'url' => ['product/index']],
                ['label' => '<i class="fa fa-caret-right"></i> Khách hàng', 'url' => ['product/index']],
              ],
              'template' => '<a href="{url}">{label} <i class="fa fa-angle-left pull-right"></i></a>',
            ],
            ['label' => '<i class="fa fa-pie-chart"></i> <span>Báo cáo</span>', 'url' => ['product/index'], 'items' => [
                ['label' => '<i class="fa fa-caret-right"></i> Báo cáo theo ngày', 'url' => ['product/index']],
                ['label' => '<i class="fa fa-caret-right"></i> Báo cáo tồn kho', 'url' => ['product/index']],
              ],
              'template' => '<a href="{url}">{label} <i class="fa fa-angle-left pull-right"></i></a>',
				'visible' => Yii::$app->user->identity->isSuperAdmin()
            ],
            ['label' => '<i class="fa fa-newspaper-o"></i> <span>Bài viết</span>', 'url' => ['/content/page/index']],
			['label' => '<i class="fa fa-users"></i> <span>Quản trị web</span>', 'url' => ['/user/default/index'], 'visible' => Yii::$app->user->identity->isSuperAdmin()],
        ],
        'options' => [
          'class' => 'sidebar-menu',
          'data-tag'=>'yii2-menu',
        ],
        'submenuTemplate' => "\n<ul class='treeview-menu'>\n{items}\n</ul>\n",
        'activeCssClass'=>'active',
        'activateParents'=>true,
        'encodeLabels' => false,
    ]);
  ?>
  </section>
  <!-- /.sidebar -->
</aside>