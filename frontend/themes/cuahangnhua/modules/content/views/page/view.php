<?php

use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = $pageModel->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- ZONE-1================================================================= -->
<?php $this->beginBlock('zone-1'); ?>

	<?= frontend\widgets\categoryMenuWidget::widget([]) ?>

<?php $this->endBlock(); ?>

<!-- ZONE-2================================================================= -->
<?php $this->beginBlock('zone-2'); ?>

	<?php echo yii\base\View::render('//partials/topMenu',array()); ?>
	
	<?= Breadcrumbs::widget([
		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
	]) ?>

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
