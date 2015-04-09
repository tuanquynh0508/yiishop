<?php
use backend\assets\AdminlteAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AdminlteAsset::register($this);

$baseUrl = Yii::$app->request->baseUrl;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
  <head>
    <meta charset="<?= Yii::$app->charset ?>">
    <title><?= Html::encode($this->title) ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
  </head>
  <body class="skin-blue">
    <?php $this->beginBody() ?>
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <a href="index2.html" class="logo">Trang Quản Trị</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo $baseUrl; ?>/adminlte/dist/img/user.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo Yii::$app->user->identity->fullname; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo $baseUrl; ?>/adminlte/dist/img/user.png" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo Yii::$app->user->identity->fullname; ?>
                      <small><?php echo Yii::t('app', 'Member'); ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Hồ sơ</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo \Yii::$app->getUrlManager()->createUrl(['/user/default/logout','key'=>'value']); ?>" class="btn btn-default btn-flat">Thoát</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <?php echo yii\base\View::render('//partials/slideMenu',array()); ?>

      <!-- =============================================== -->

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <?= $content ?>
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <?= Yii::powered() ?>. <b>Version</b> 1.0.
        </div>
        <strong>Copyright © <?php echo date('Y'); ?> <a href="http://i-designer.net">I-Designer</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage() ?>
