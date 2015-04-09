<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">

	<?= "<?php " ?> echo yii\base\View::render('//partials/flashMessage', array()); ?>

	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><?= "<?= " ?> Html::encode($this->title) ?></h3>
		</div><!-- /.box-header -->
		<div class="box-body">

			<?= "<?= " ?>DetailView::widget([
					'model' => $model,
					'attributes' => [
			<?php
			if (($tableSchema = $generator->getTableSchema()) === false) {
				foreach ($generator->getColumnNames() as $name) {
					echo "            '" . $name . "',\n";
				}
			} else {
				foreach ($generator->getTableSchema()->columns as $column) {
					$format = $generator->generateColumnFormat($column);
					echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
				}
			}
			?>
					],
				]) ?>

		</div><!-- /.box-body -->
		<div class="box-footer">
			<?= "<?= " ?> Html::a('<i class="fa fa-caret-left"></i> ' . <?= $generator->generateString('Back')?>, ['index'], ['class' => 'btn btn-default']) ?>
			<?= "<?= " ?> Html::a(<?= $generator->generateString('Update')?>, ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
			<?= "<?= " ?>
			Html::a(<?= $generator->generateString('Delete')?>, ['delete', 'id' => $model->id], [
				'class' => 'btn btn-danger',
				'data' => [
					'confirm' => <?= $generator->generateString('Are you sure you want to delete this item?')?>,
					'method' => 'post',
				],
			])
			?>
		</div>
	</div><!-- /.box -->

</section><!-- /.content -->