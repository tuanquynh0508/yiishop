<?php

use yii\helpers\Html;
use yii\grid\GridView;
//use yii\bootstrap\ActiveForm;
use yii\web\View;

$this->title = 'Danh mục sản phẩm';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Danh mục sản phẩm
		<small>Danh sách</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- ====================================== -->
    <div class="box box-primary">
        <div class="box-header">
			<!--			<h3 class="box-title">Danh mục</h3>-->
			<div class="box-tools">
				<a href="<?php echo \Yii::$app->getUrlManager()->createUrl(['/category/default/create']); ?>" class="btn btn-block btn-success btn-sm"><i class="fa fa-plus"></i> Thêm mới</a>
			</div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
			<?=
			GridView::widget([
				'dataProvider' => $dataProvider,
				'filterModel' => $searchModel,
				'columns' => [
					['class' => 'yii\grid\SerialColumn'],
					'id',
					'parent_id',
					'slug',
					'title',
					'description:ntext',
					// 'created_at',
					// 'updated_at',
					// 'del_flg',
					['class' => 'yii\grid\ActionColumn'],
				],
			]);
			?>
        </div><!-- /.box-body -->
	</div><!-- /.box -->
	<!-- ====================================== -->
</section><!-- /.content -->