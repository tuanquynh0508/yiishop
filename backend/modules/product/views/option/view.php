<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\OptionGroup */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Option Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">

	<?php  echo yii\base\View::render('//partials/flashMessage', array()); ?>

	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><?=  Html::encode($this->title) ?></h3>
		</div><!-- /.box-header -->
		<div class="box-body">

			<?php
			$options = '';
			$listOption = $model->options;
			foreach($listOption as $option) {
				if($model->option_type == 'color') {					
					$options .= '<i class="fa fa-square fa-lg" style="color:'.$option->title.';"></i> &nbsp;';
				} else {
					$options .= '<p>- '.$option->title.'</p>';
				}
			}
			echo DetailView::widget([
				'model' => $model,
				'attributes' => [
					'id',
					'title',
					'option_type',
					[
						'attribute' => 'options',
						'value' => $options,
						'format' => 'html',
					],
					'created_at',
					'updated_at',
				],
			]) ?>

		</div><!-- /.box-body -->
		<div class="box-footer">
			<?=  Html::a('<i class="fa fa-caret-left"></i> ' . Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-default']) ?>
			<?=  Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
			<?= 			Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
				'class' => 'btn btn-danger',
				'data' => [
					'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
					'method' => 'post',
				],
			])
			?>
		</div>
	</div><!-- /.box -->

</section><!-- /.content -->