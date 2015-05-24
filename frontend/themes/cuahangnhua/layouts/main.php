<?php
use frontend\assets\CuahangnhuaAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

CuahangnhuaAsset::register($this);

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
  <body class="skin-blue layout-boxed">
    <?php $this->beginBody() ?>

	  <?php echo yii\base\View::render('//partials/headerTop',array()); ?>

    <!-- Site wrapper -->
    <div class="wrapper">

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">

		<div class="bannerTop">
			<div class="row">
				<div class="col-sm-6">
					<a href="<?php echo Yii::$app->homeUrl; ?>" class="siteLogoTop"><span><?= Html::encode($this->title) ?></span></a>
				</div>
				<div class="col-sm-6">
					<?= frontend\widgets\searchTopWidget::widget([
						'sufix' => ''
					]) ?>
				</div>
			</div>
		</div><!-- /.bannerTop -->

        <?= $content ?>
      </div><!-- /.content-wrapper -->

    </div><!-- ./wrapper -->

	<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <?= Yii::powered() ?>. <b>Version</b> 1.0.
        </div>
        <strong>Copyright © <?php echo date('Y'); ?> <a href="http://i-designer.net">I-Designer</a>.</strong> All rights reserved.
      </footer>

    <?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage() ?>
