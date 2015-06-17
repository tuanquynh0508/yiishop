<?php
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = $pageModel->title;
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- zone-before-body======================================================= -->
<?php $this->beginBlock('zone-before-body'); ?>
<?php echo yii\base\View::render('//partials/breadcrumbs',array('classCss' => 'margin-vertical-bottom grid_15')); ?>
<?php $this->endBlock(); ?>

<!-- zone-left-body========================================================= -->
<?php $this->beginBlock('zone-left-body'); ?>
  <div class="page-header">
    <h1><?= $pageModel->title ?></h1>
  </div>

  <div class="page-content">
    <?= $pageModel->content ?>
  </div>
<?php $this->endBlock(); ?>

<!-- zone-right-body======================================================== -->
<?php $this->beginBlock('zone-right-body'); ?>
<?php $this->endBlock(); ?>