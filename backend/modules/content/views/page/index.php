<?php

use Yii;
use yii\helpers\Html;
use backend\components\CGridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pages');
$this->params['breadcrumbs'][] = $this->title;

$baseUrl = Yii::$app->request->baseUrl;
$this->registerCssFile($baseUrl . '/adminlte/plugins/datatables/dataTables.bootstrap.css', ['depends' => [\backend\assets\AdminlteAsset::className()]]);
?>
<!-- Main content -->
<section class="content">
	<!-- ====================================== -->
	<?php  echo yii\base\View::render('//partials/flashMessage', array()); ?>

	<div class="box box-primary">
        <div class="box-header">
			<h3 class="box-title"><?=  Html::encode($this->title) ?></h3>
			<div class="box-tools">
				<?=  Html::a('<i class="fa fa-plus"></i> ' . Yii::t('app', 'Add New'), ['create'], ['class' => 'btn btn-block btn-success btn-sm']) ?>
			</div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body no-padding">

			    <?= CGridView::widget([
		'tableOptions' => [
			'class' => 'table table-bordered table-striped dataTable'
		],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
			'title',
            'slug',
            'views',
            // 'created_at',
            // 'updated_at',
            // 'del_flg',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

		</div><!-- /.box-body -->
	</div><!-- /.box -->
	<!-- ====================================== -->
</section><!-- /.content -->