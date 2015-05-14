<?php

use \Yii;
use yii\helpers\Html;
use backend\components\CGridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
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
			[
				'attribute' => 'image',
				'format' => 'html',
				'value' => function ($data) {
					return Html::img($data->getDefaultImg('s'), ['height' => 30]);
				},
				'enableSorting' => false,
				'filter' => false,
			],
			[
				'attribute' => 'id',
				'value' => function($data) {return $data->id;},
				'headerOptions' => ['width' => '5%'],
			],
			[
				'attribute' => 'upc',
				'value' => function($data) {return $data->upc;},
				'headerOptions' => ['width' => '5%', 'nowrap' => ''],
			],
			[
				'attribute' => 'quantity',
				'value' => function($data) {return $data->quantity;},
				'headerOptions' => ['width' => '5%', 'nowrap' => ''],
			],
			'title',
			'slug',
			[
				'attribute' => 'firm_id',
				'value' => function($data) {return $data->firm->title;},
				'headerOptions' => ['width' => '10%', 'nowrap' => ''],
			],
			[
				'attribute' => 'status',
				'format' => 'html',
				'value' => function ($data) {
					$value = '';
					if ($data->out_of_stock == 0) {
						$value .= '<span class="label label-success">Còn hàng</span>&nbsp;';
					} else {
						$value .= '<span class="label label-danger">Hết hàng</span>&nbsp;';
					}
					if ($data->is_new == 1) {
						$value .= '<span class="label label-primary">Hàng mới</span>&nbsp;';
					}
					if ($data->is_special == 1) {
						$value .= '<span class="label label-warning">Đặc biệt</span>';
					}
					return $value;
				},
				'enableSorting' => false,
				'filter' => false,
				'headerOptions' => ['nowrap' => ''],
			],
            // 'description:ntext',
            // 'wholesale_prices',
            // 'retail_price',
            // 'cost',
            // 'made',
            // 'quantity',
            // 'out_of_stock',
            // 'is_new',
            // 'is_special',
            // 'views',
            // 'created_at',
            // 'updated_at',
            // 'del_flg',

            [
				'class' => 'yii\grid\ActionColumn',
				'contentOptions' => ['style' => 'white-space: nowrap;'],
			],
        ],
    ]); ?>

		</div><!-- /.box-body -->
	</div><!-- /.box -->
	<!-- ====================================== -->
</section><!-- /.content -->