<?php

use Yii;
use yii\helpers\Html;
//use yii\grid\GridView;
use backend\components\CGridView;
//use yii\bootstrap\ActiveForm;
use yii\web\View;

$this->title = 'Hãng sản xuất';
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
				<a href="<?php echo \Yii::$app->getUrlManager()->createUrl(['/firm/default/create']); ?>" class="btn btn-block btn-success btn-sm"><i class="fa fa-plus"></i> Thêm mới</a>
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
					'title',
					[
						'attribute' => 'logo',
						'format' => 'html',
						'value' => function ($data) {
							$picture = Yii::getAlias('@img_path/category/') . Yii::$app->params['upload_var']['small']['prefix'] . $data->logo;
							if (empty($data->logo)) {
								$picture = Yii::getAlias('@img_path/sm_nopicture.jpg');
							}
							return Html::img($picture, ['height' => 30]);
						},
								'enableSorting' => false,
								'filter' => false,
							],
							['class' => 'yii\grid\ActionColumn'],
						],
					]);
					?>
        </div><!-- /.box-body -->
	</div><!-- /.box -->
	<!-- ====================================== -->
</section><!-- /.content -->