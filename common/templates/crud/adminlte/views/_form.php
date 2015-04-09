<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title"><?= "<?= " ?> Html::encode($this->title) ?></h3>
	</div><!-- /.box-header -->
	<!-- form start -->
	<?= "<?php " ?> $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	<div class="box-body">

	<?php foreach ($generator->getColumnNames() as $attribute) {
		if (in_array($attribute, $safeAttributes)) {
			echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
		}
	} ?>

	</div><!-- /.box-body -->
	<div class="box-footer">
		<?= "<?= " ?> Html::a('<i class="fa fa-caret-left"></i> ' . <?= $generator->generateString('Back')?>, ['index'], ['class' => 'btn btn-default']) ?>
		<?= "<?= " ?> Html::submitButton('<i class="fa fa-save"></i> ' . ($model->isNewRecord ? <?= $generator->generateString('Create')?> : <?= $generator->generateString('Update')?>), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>
	<?= "<?php " ?> ActiveForm::end(); ?>
</div><!-- /.box -->