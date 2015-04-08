<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Firm */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Firms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">

	<?php echo yii\base\View::render('//partials/flashMessage', array()); ?>

	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><?= Html::encode($this->title) ?></h3>
		</div><!-- /.box-header -->
		<div class="box-body">
			<?=
			DetailView::widget([
				'model' => $model,
				'attributes' => [
					'id',
					'title',
					'logo',
					'created_at',
					'updated_at',
					'del_flg',
				],
			])
			?>
		</div><!-- /.box-body -->
		<div class="box-footer">
			<a href="<?php echo \Yii::$app->getUrlManager()->createUrl(['/firm/default/index']); ?>" class="btn btn-default"><i class="fa fa-caret-left"></i> Quay lại</a>
			<?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
			<?=
			Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
				'class' => 'btn btn-danger',
				'data' => [
					'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
					'method' => 'post',
				],
			])
			?>
		</div>
	</div><!-- /.box -->

</section><!-- /.content -->
