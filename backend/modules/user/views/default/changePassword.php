<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = Yii::t('app', 'Đổi mật khẩu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
	
	<?php  echo yii\base\View::render('//partials/flashMessage', array()); ?>
	
    <div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><?=  Html::encode($this->title) ?></h3>
		</div><!-- /.box-header -->
		<!-- form start -->
		<?php  $form = ActiveForm::begin(); ?>
		<div class="box-body">

		<?= $form->field($model, 'passwordOld')->passwordInput(['maxlength' => 255]) ?>
			
		<?= $form->field($model, 'password')->passwordInput(['maxlength' => 255]) ?>   

		<?= $form->field($model, 'passwordConfirm')->passwordInput(['maxlength' => 255]) ?>

		</div><!-- /.box-body -->
		<div class="box-footer">
			<?=  Html::submitButton('<i class="fa fa-save"></i> ' . Yii::t('app', 'Update'), ['class' => 'btn btn-primary']) ?>
		</div>
		<?php  ActiveForm::end(); ?>
	</div><!-- /.box -->

</section><!-- /.content -->
