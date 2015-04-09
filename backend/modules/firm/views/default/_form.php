<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Firm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title"><?= Html::encode($this->title) ?></h3>
	</div><!-- /.box-header -->
	<!-- form start -->
	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	<div class="box-body">
		<?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

		<?php
		if (!empty($model->logo)) {
			echo '<div class="form-group">';
			$picture = Yii::getAlias('@img_path/category/') . Yii::$app->params['upload_var']['small']['prefix'] . $model->logo;
			echo Html::img($picture, ['height' => 30]);
			echo '</div>';
		}
		?>

		<?= $form->field($model, 'logo')->fileInput() ?>
	</div><!-- /.box-body -->
	<div class="box-footer">
		<a href="<?php echo \Yii::$app->getUrlManager()->createUrl(['/firm/default/index']); ?>" class="btn btn-default"><i class="fa fa-caret-left"></i> Quay lại</a>
		<?= Html::submitButton('<i class="fa fa-save"></i> ' . ($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update')), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>
	<?php ActiveForm::end(); ?>
</div><!-- /.box -->
