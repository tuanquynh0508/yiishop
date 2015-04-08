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
    <div class="box box-primary">
        <div class="box-header">
			<h3 class="box-title"><?= Html::encode($this->title) ?></h3>
			<div class="box-tools">
				<a href="<?php echo \Yii::$app->getUrlManager()->createUrl(['/category/default/create']); ?>" class="btn btn-block btn-success btn-sm"><i class="fa fa-plus"></i> Thêm mới</a>
			</div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
			<?=
			CGridView::widget([
				'dataProvider' => $dataProvider,
				'filterModel' => $searchModel,
				'tableOptions' => [
					'class' => 'table table-bordered table-striped dataTable'
				],
				'columns' => [
					['class' => 'yii\grid\SerialColumn'],
					'id',
					//'parent_id',
//					[
//						'attribute' => 'parentName',
//						'format' => 'raw',
//						'value' => function ($data) {
//							return $data->parentName;
//						},
//					],
					'parentName',
					'slug',
					'title',
					['class' => 'yii\grid\ActionColumn'],
				],
			]);
			?>
        </div><!-- /.box-body -->
	</div><!-- /.box -->
	<!-- ====================================== -->
</section><!-- /.content -->