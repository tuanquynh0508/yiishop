<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\OptionGroup */
/* @var $form yii\widgets\ActiveForm */
$baseUrl = Yii::$app->request->baseUrl;
$this->registerCssFile($baseUrl.'/adminlte/plugins/colorpicker/bootstrap-colorpicker.min.css', ['depends' => [\backend\assets\AdminlteAsset::className()]]);
$this->registerJsFile($baseUrl.'/adminlte/plugins/colorpicker/bootstrap-colorpicker.min.js', ['depends' => [\yii\bootstrap\BootstrapPluginAsset::className()]]);

$this->registerJs("
$(function () {
	var model = $('#optiongroup-option_type').val();
	
	initialListOptionAction();	
	
	//Change model input by database
	changeModelInput(model);
	
	addListOptionItem();
});

function initialListOptionAction() {
	$(document).on('focus', '.listOptionItem .listOptionItemText', function() {
		var parent = $(this).parent();
		var totalItem = $('.listOptions .listOptionItem').length;
		if(parent.index()==totalItem-1) {
			addListOptionItem();
		}
	});

	$(document).on('click', '.listOptionItem .btnDelete', function(e) {
		var parent = $(this).closest('.listOptionItem');
		parent.remove();
		var totalItem = $('.listOptions .listOptionItem').length;
		if(totalItem==0) {
			addListOptionItem();
		}
	});
	
	$('#optiongroup-option_type').change(function(){
		changeModelInput($(this).val());
	});
	
	//Set default all is color input
	changeModelInput('color');
}

function addListOptionItem() {
	var index = $('.listOptions .listOptionItem').length+1;
	createItem(-index);
}

function createItem(index) {
	var html = `
	<div class='form-group input-group listOptionItem'>		
		<span class='input-group-btn'>
			<button class='btn btn-default btn-flat btnDelete' type='button' tabindex='-1'><i class='fa fa-trash-o'></i></button>
		</span>
		<div class='input-group-addon'>
			<i></i>
	    </div>		
		<input type='text' class='form-control listOptionItemText' name='Options[`+index+`]'/>
	</div>
	`;
	var model = $('#optiongroup-option_type').val();
	var input = $(html);
	if(model == 'color') {
		input.colorpicker();
	} else {
		input.find('.input-group-addon').hide();
	}
	$('.listOptions').append(input);
}

function changeModelInput(model) {
	if(model == 'text') {
		$('.listOptionItem').each(function(){
			var input = $('.listOptionItemText', $(this));
			$(this).colorpicker('destroy');
			$('.input-group-addon', $(this)).hide();
			if(input.attr('data-backup')) {
				input.val(input.attr('data-backup'));
			}
		});
	} else if(model == 'color') {
		$('.listOptionItem').each(function(){
			var input = $('.listOptionItemText', $(this));
			input.attr('data-backup', input.val());
			if(!input.val().contains('#')){
				input.val('');
			}			
			$(this).colorpicker();
			$('.input-group-addon', $(this)).show();
		});		
	}
}

if (!('contains' in String.prototype)) {
    String.prototype.contains = function (str, startIndex) {
        'use strict';
        return -1 !== String.prototype.indexOf.call(this, str, startIndex);
    };
}

", View::POS_END);
?>

<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title"><?= Html::encode($this->title) ?></h3>
	</div><!-- /.box-header -->
	<!-- form start -->
	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	<div class="box-body">

		<?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

		<?= $form->field($model, 'option_type')->dropDownList($model->getTypeList()); ?>

		<h4>Thuộc tính</h4>
		<div class="listOptions">
			<?php foreach($listOptions as $optionId => $optionTitle): ?>
			<div class='form-group input-group listOptionItem'>				
				<span class='input-group-btn'>
					<button class='btn btn-default btn-flat btnDelete' type='button' tabindex='-1'><i class='fa fa-trash-o'></i></button>
				</span>
				<div class='input-group-addon'>
					<i></i>
				</div>
				<input type='text' class='form-control listOptionItemText' name='Options[<?= $optionId ?>]' value="<?= $optionTitle ?>"/>
			</div>
			<?php endforeach; ?>
		</div>

	</div><!-- /.box-body -->
	<div class="box-footer">
		<?= Html::a('<i class="fa fa-caret-left"></i> ' . Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-default']) ?>
		<?= Html::submitButton('<i class="fa fa-save"></i> ' . ($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update')), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>
	<?php ActiveForm::end(); ?>
</div><!-- /.box -->