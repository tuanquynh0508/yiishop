<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use backend\components\CGridView;
//use yii\bootstrap\ActiveForm;
use yii\web\View;

$this->title = 'Danh mục sản phẩm';
$this->params['breadcrumbs'][] = $this->title;

$baseUrl = Yii::$app->request->baseUrl;
$this->registerCssFile($baseUrl . '/adminlte/plugins/datatables/dataTables.bootstrap.css', ['depends' => [\backend\assets\AdminlteAsset::className()]]);
?>

<!-- Main content -->
<section class="content">
	<!-- ====================================== -->
	
	<?php echo yii\base\View::render('//partials/flashMessage', array()); ?>
	
    <div class="box box-primary">
        <div class="box-header">
			<h3 class="box-title"><?= Html::encode($this->title) ?></h3>
			<div class="box-tools">
				<?= Html::a('<i class="fa fa-plus"></i> ' . Yii::t('app', 'Add New'), ['create'], ['class' => 'btn btn-block btn-success btn-sm']) ?>
			</div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body no-padding">			
			<ul class="todo-list">
				<?php foreach($list as $item): ?>
				<li>
					<!-- drag handle -->
					<span class="handle">
						<i class="fa fa-ellipsis-v"></i>
						<i class="fa fa-ellipsis-v"></i>
					</span>
					<!-- todo text -->
					<span class="text"><?= Html::decode($item->title) ?></span>
					<!-- General tools such as edit or delete-->
					<div class="tools">
						<?=  Html::a('<i class="fa fa-edit"></i>', ['update', 'id' => $item->id], ['class' => 'text-danger']) ?>
						<?= Html::a('<i class="fa fa-trash-o"></i>', ['delete', 'id' => $item->id], [
							'class' => 'text-danger',
							'data' => [
								'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
								'method' => 'post',
							],
						])
						?>						
					</div>
				</li>
				<?php endforeach; ?>
			</ul>
        </div><!-- /.box-body -->
	</div><!-- /.box -->
	<!-- ====================================== -->
</section><!-- /.content -->