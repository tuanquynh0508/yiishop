<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\Sale */
/* @var $form yii\widgets\ActiveForm */

$baseUrl = Yii::$app->request->baseUrl;
//$this->registerCssFile($baseUrl.'/adminlte/plugins/iCheck/square/blue.css', ['depends' => [\backend\assets\AdminlteAsset::className()]]);
$this->registerJsFile($baseUrl.'/adminlte/plugins/input-mask/jquery.inputmask.js', ['depends' => [\yii\bootstrap\BootstrapPluginAsset::className()]]);
$this->registerJsFile($baseUrl.'/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js', ['depends' => [\yii\bootstrap\BootstrapPluginAsset::className()]]);
$this->registerJsFile($baseUrl.'/adminlte/plugins/input-mask/jquery.inputmask.extensions.js', ['depends' => [\yii\bootstrap\BootstrapPluginAsset::className()]]);
$this->registerJs("
$(function () {    
	$('[data-mask]').inputmask();
});
", View::POS_END);
?>

<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title"><?=  Html::encode($this->title) ?></h3>
	</div><!-- /.box-header -->
	<!-- form start -->
	<?php  $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	<div class="box-body">

	    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'sale')->textInput()->hint('Giảm giá theo % (Không cần nhập ký tự %). Vi dụ: 10') ?>

    <?= $form->field($model, 'start_date', ['template' => '
	<label>{label}</label>
	<div class="input-group">
        <div class="input-group-addon">
			<i class="fa fa-calendar"></i>
		</div>
        {input}
	</div>
	{error}{hint}'])
	->textInput(['data-inputmask' => "'alias': 'yyyy-mm-dd'", 'data-mask' => ''])
	->hint('Định dạng ngày (YYYY-MM-DD).')?>
	
	<?= $form->field($model, 'end_date', ['template' => '
	<label>{label}</label>
	<div class="input-group">
        <div class="input-group-addon">
			<i class="fa fa-calendar"></i>
		</div>
        {input}
	</div>
	{error}{hint}'])
	->textInput(['data-inputmask' => "'alias': 'yyyy-mm-dd'", 'data-mask' => ''])
	->hint('Định dạng ngày (YYYY-MM-DD), ngày phải lớn hơn Start Date.')?>

	</div><!-- /.box-body -->
	<div class="box-footer">
		<?=  Html::a('<i class="fa fa-caret-left"></i> ' . Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-default']) ?>
		<?=  Html::submitButton('<i class="fa fa-save"></i> ' . ($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update')), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>
	<?php  ActiveForm::end(); ?>
</div><!-- /.box -->