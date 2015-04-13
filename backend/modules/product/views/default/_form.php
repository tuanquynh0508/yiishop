<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Firm;
use common\models\Category;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<!-- Custom Tabs (Pulled to the right) -->
<div class="nav-tabs-custom">
	<ul class="nav nav-tabs pull-right">
		<li class="active"><a href="#tab_1" data-toggle="tab">Thông tin cơ bản</a></li>
		<li><a href="#tab_2" data-toggle="tab">Chi tiết</a></li>
		<li><a href="#tab_3" data-toggle="tab">Liên kết danh mục</a></li>
		<li class="pull-left header"><i class="fa fa-cube"></i> <?= Html::encode($this->title) ?></li>
	</ul>
	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	<div class="tab-content">	  
		<div class="tab-pane active" id="tab_1">
			<div class="box-body">
				<?= $form->field($model, 'upc')->textInput(['maxlength' => 255])->hint('Mã hàng phải là duy nhất, không được trùng lặp') ?>

				<?= $form->field($model, 'slug')->textInput(['maxlength' => 255]) ?>

				<?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

				<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
			</div>
		</div><!-- /.tab-pane -->

		<div class="tab-pane" id="tab_2">
			<div class="box-body">
				<?= $form->field($model, 'cost')->textInput()->hint('Giá này không xuất hiện trên web') ?>
				<?= $form->field($model, 'wholesale_prices')->textInput()->hint('Giá này không xuất hiện trên web') ?>

				<?= $form->field($model, 'retail_price')->textInput()->hint('Giá này sẽ xuất hiện trên web') ?>    				

				<?= $form->field($model, 'quantity')->textInput()->hint('Nếu muốn quản lý số lượng sản phẩm, thì nhập vào đây. Còn không thì đặt là 0.') ?>

				<?= $form->field($model, 'out_of_stock')->checkbox() ?>
			</div>
		</div><!-- /.tab-pane -->

		<div class="tab-pane" id="tab_3">
			<div class="box-body">
				<?= $form->field($model, 'made')->textInput(['maxlength' => 2])->hint('Sử dụng mã nước với 2 ký tự. Ví dụ: vn-Việt Nam, cn-Trung Quốc <br/>Xem thêm tại đây: https://countrycode.org/') ?>
				<?=
				$form->field($model, 'firm_id')->dropDownList(
						ArrayHelper::map(Firm::findAll(['del_flg' => '0']), 'id', 'title'), array('prompt' => 'Hãng sản xuất')
				)
				?>
				<?=
				$form->field($model, 'categories')->listBox(
						ArrayHelper::map(Category::staticGetTreeCategory(0, 1, "----", false), 'id', 'title'), 
						array(
							'prompt' => 'Chọn danh mục sản phẩm',
							'multiple' => true,
							'size' => '10'
						)
				)->hint('Chọn một hoặc nhiều danh mục. Bấm Ctrl+Click để chọn nhiều danh mục.')
				?>
				<?= $form->field($model, 'is_new')->checkbox() ?>
				<?= $form->field($model, 'is_special')->checkbox() ?>
			</div>
		</div><!-- /.tab-pane -->


	</div><!-- /.tab-content -->
	
	<div class="box-footer">
		<?= Html::a('<i class="fa fa-caret-left"></i> ' . Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-default']) ?>
		<?= Html::submitButton('<i class="fa fa-save"></i> ' . ($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update')), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>
	
	<?php ActiveForm::end(); ?>

</div><!-- nav-tabs-custom -->