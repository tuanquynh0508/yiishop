<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
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
    <div class="box">
        <div class="box-header">
			<h3 class="box-title">Danh mục</h3>
			<div class="box-tools">
				<a href="<?php echo \Yii::$app->getUrlManager()->createUrl(['/category/default/create']); ?>" class="btn btn-block btn-success btn-sm"><i class="fa fa-plus"></i> Thêm mới</a>
			</div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
			<table class="table table-striped">
				<tr>
					<th style="width: 10px">#</th>
					<th>Tên</th>
					<th>Danh mục cha</th>
					<th style="width: 40px"></th>
				</tr>
				<tr>
					<td>1.</td>
					<td>Update software</td>
					<td>
						<div class="progress progress-xs">
							<div class="progress-bar progress-bar-danger" style="width: 55%"></div>
						</div>
					</td>
					<td><span class="badge bg-red">55%</span></td>
				</tr>
				<tr>
					<td>2.</td>
					<td>Clean database</td>
					<td>
						<div class="progress progress-xs">
							<div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
						</div>
					</td>
					<td><span class="badge bg-yellow">70%</span></td>
				</tr>
				<tr>
					<td>3.</td>
					<td>Cron job running</td>
					<td>
						<div class="progress progress-xs progress-striped active">
							<div class="progress-bar progress-bar-primary" style="width: 30%"></div>
						</div>
					</td>
					<td><span class="badge bg-light-blue">30%</span></td>
				</tr>
				<tr>
					<td>4.</td>
					<td>Fix and squish bugs</td>
					<td>
						<div class="progress progress-xs progress-striped active">
							<div class="progress-bar progress-bar-success" style="width: 90%"></div>
						</div>
					</td>
					<td><span class="badge bg-green">90%</span></td>
				</tr>
			</table>
        </div><!-- /.box-body -->
	</div><!-- /.box -->
	<!-- ====================================== -->
</div>