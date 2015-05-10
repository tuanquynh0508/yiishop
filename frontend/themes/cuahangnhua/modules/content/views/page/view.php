<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = $pageModel->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- ZONE-1================================================================= -->
<?php $this->beginBlock('zone-1'); ?>

	<?php echo yii\base\View::render('//partials/categoryMenu',array()); ?>

<?php $this->endBlock(); ?>

<!-- ZONE-2================================================================= -->
<?php $this->beginBlock('zone-2'); ?>

	<?php echo yii\base\View::render('//partials/topMenu',array()); ?>

	<ul class="breadcrumb">
		<li><a href="/backend/">Trang chủ</a></li>
		<li><a href="/backend/product/default/index">Products</a></li>
		<li class="active">Sản phẩm 3</li>
	</ul>

	<div class="page-header">
		<h1><?= $pageModel->title ?></h1>
	</div>

	<div class="page-content">
		<?= $pageModel->content ?>
	</div>

<?php $this->endBlock(); ?>

<!-- ZONE-3================================================================= -->
<?php //$this->beginBlock('zone-3'); ?>

<?php //$this->endBlock(); ?>
