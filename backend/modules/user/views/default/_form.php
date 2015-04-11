<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title"><?=  Html::encode($this->title) ?></h3>
	</div><!-- /.box-header -->
	<!-- form start -->
	<?php  $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	<div class="box-body">

	<?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>   
		
	<?= $form->field($model, 'password')->passwordInput(['maxlength' => 255])->hint('Trong trường hợp cập nhật, nhập mật khẩu mới nếu bạn muốn thay đổi.') ?>   
		
	<?= $form->field($model, 'passwordConfirm')->passwordInput(['maxlength' => 255]) ?>
	
	<?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => 50]) ?>    
		
	<?= $form->field($model, 'is_super')->checkbox() ?>
		
    <?= $form->field($model, 'status')->checkbox() ?>

	</div><!-- /.box-body -->
	<div class="box-footer">
		<?=  Html::a('<i class="fa fa-caret-left"></i> ' . Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-default']) ?>
		<?=  Html::submitButton('<i class="fa fa-save"></i> ' . ($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update')), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>
	<?php  ActiveForm::end(); ?>
</div><!-- /.box -->