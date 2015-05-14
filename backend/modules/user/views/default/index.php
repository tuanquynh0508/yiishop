<?php

use \Yii;
use yii\helpers\Html;
use backend\components\CGridView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
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
				'attribute' => 'id',
				'value' => function($data) {return $data->id;},
				'headerOptions' => ['width' => '50'],
			],
			[
				'attribute' => 'username',
				'format' => 'html',
				'value' => function($data) {
					if($data->isSuperAdmin()) {
						$isSuper = '<i class="fa fa-gavel"></i>';
					} else {
						$isSuper = '<i class="fa fa-user"></i>';
					}
					return $isSuper.'-'.$data->username;
				},
			],
            'first_name',
            'last_name',
            'email:email',
			[
				'attribute' => 'status',
				'format' => 'html',
				'value' => function ($data) {
					if ($data->status==User::STATUS_ACTIVE) {
						return '<span class="label label-success">Hoạt động</span>';
					} else {
						return '<span class="label label-danger">Đang khóa</span>';
					}
				},
				//'enableSorting' => true,
				'filter' => false,
				'headerOptions' => ['width' => '80'],
			],
            //'status',
            // 'last_login',
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