<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->getFullname();
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
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
			if($model->status==User::STATUS_ACTIVE) {
				$status = '<span class="label label-success">Hoạt động</span>';
			} else {
				$status = '<span class="label label-danger">Đang khóa</span>';
			}
			
			if($model->isSuperAdmin()) {
				$isSuper = '<i class="fa fa-gavel"></i>';
			} else {
				$isSuper = '<i class="fa fa-user"></i>';
			}
			
			echo DetailView::widget([
				'model' => $model,
				'attributes' => [
					'id',
					'username',            
					'first_name',
					'last_name',
					'email:email',
					[
						'attribute' => 'status',
						'value' => $status,
						'format' => 'html',
					],
					[
						'attribute' => 'is_super',
						'value' => $isSuper,
						'format' => 'html',
					],
					'last_login',
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