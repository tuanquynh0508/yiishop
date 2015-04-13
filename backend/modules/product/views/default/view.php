<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">

	<?php  echo yii\base\View::render('//partials/flashMessage', array()); ?>

	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><?=  Html::encode($this->title) ?></h3>
		</div><!-- /.box-header -->
		<div class="box-body">

			<?= DetailView::widget([
					'model' => $model,
					'attributes' => [
			            'id',
            'firm_id',
            'upc',
            'slug',
            'title',
            'description:ntext',
            'wholesale_prices',
            'retail_price',
            'cost',
            'made',
            'quantity',
            'out_of_stock',
            'is_new',
            'is_special',
            'views',
            'created_at',
            'updated_at',
            'del_flg',
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