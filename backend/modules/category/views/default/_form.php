<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title"><?= Html::encode($this->title) ?></h3>
	</div><!-- /.box-header -->
	<!-- form start -->
	<?php $form = ActiveForm::begin(); ?>
	<div class="box-body">
		<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'parent_id')->textInput() ?>

		<?= $form->field($model, 'slug')->textInput(['maxlength' => 255]) ?>

		<?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

		<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
	</div><!-- /.box-body -->
	<div class="box-footer">
		<?= Html::submitButton('<i class="fa fa-save"></i> ' . ($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update')), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>
	<?php ActiveForm::end(); ?>
</div><!-- /.box -->
