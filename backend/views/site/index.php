<?php
/* @var $this yii\web\View */
use yii\web\View;

$this->title = 'My Yii Application';

$baseUrl = Yii::$app->request->baseUrl;
$this->registerJsFile($baseUrl.'/adminlte/plugins/slimScroll/jquery.slimscroll.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile($baseUrl.'/adminlte/plugins/fastclick/fastclick.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

//$this->registerJsFile($baseUrl.'/adminlte/plugins/raphael-min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
//$this->registerCssFile($baseUrl.'/adminlte/plugins/morris/morris.css', ['depends' => [\backend\assets\AdminlteAsset::className()]]);
//$this->registerJsFile($baseUrl.'/adminlte/plugins/morris/morris.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

/*$this->registerJs("
$(function () {
	
	// LINE CHART
	var line = new Morris.Line({
	  element: 'line-chart',
	  resize: true,
	  data: [
		{y: '2011 Q1', item1: 2666},
		{y: '2011 Q2', item1: 2778},
		{y: '2011 Q3', item1: 4912},
		{y: '2011 Q4', item1: 3767},
		{y: '2012 Q1', item1: 6810},
		{y: '2012 Q2', item1: 5670},
		{y: '2012 Q3', item1: 4820},
		{y: '2012 Q4', item1: 15073},
		{y: '2013 Q1', item1: 10687},
		{y: '2013 Q2', item1: 8432}
	  ],
	  xkey: 'y',
	  ykeys: ['item1'],
	  labels: ['Item 1'],
	  lineColors: ['#3c8dbc'],
	  hideHover: 'auto'
	});

});
", View::POS_END);*/

?>
<?php /*
<!-- Main content -->
<section class="content">
	<!-- ====================================== -->
	
	<div class="row">
		
		<div class="col-md-6">
              
			<!-- LINE CHART -->
			<div class="box box-info">
			  <div class="box-header">
				<h3 class="box-title">Báo cáo bán hàng</h3>
			  </div>
			  <div class="box-body chart-responsive">
				<div class="chart" id="line-chart" style="height: 300px;"></div>
			  </div><!-- /.box-body -->
			</div><!-- /.box -->
			  
		</div><!-- /.col-md-6 -->
		
		<div class="col-md-6">

			<!-- Application buttons -->
			<div class="box box-primary">
			  <div class="box-header">
				<h3 class="box-title">Application Buttons</h3>
			  </div>
			  <div class="box-body">
				<p>Add the classes <code>.btn.btn-app</code> to an <code>&lt;a></code> tag to achieve the following:</p>
				<a class="btn btn-app">
				  <i class="fa fa-edit"></i> Edit
				</a>
				<a class="btn btn-app">
				  <i class="fa fa-play"></i> Play
				</a>
				<a class="btn btn-app">
				  <i class="fa fa-repeat"></i> Repeat
				</a>
				<a class="btn btn-app">
				  <i class="fa fa-pause"></i> Pause
				</a>
				<a class="btn btn-app">
				  <i class="fa fa-save"></i> Save
				</a>
				<a class="btn btn-app">
				  <span class="badge bg-yellow">3</span>
				  <i class="fa fa-bullhorn"></i> Notifications
				</a>
				<a class="btn btn-app">
				  <span class="badge bg-green">300</span>
				  <i class="fa fa-barcode"></i> Products
				</a>
				<a class="btn btn-app">
				  <span class="badge bg-purple">891</span>
				  <i class="fa fa-users"></i> Users
				</a>
				<a class="btn btn-app">
				  <span class="badge bg-teal">67</span>
				  <i class="fa fa-inbox"></i> Orders
				</a>
				<a class="btn btn-app">
				  <span class="badge bg-aqua">12</span>
				  <i class="fa fa-envelope"></i> Inbox
				</a>
				<a class="btn btn-app">
				  <span class="badge bg-red">531</span>
				  <i class="fa fa-heart-o"></i> Likes
				</a>
			  </div><!-- /.box-body -->
			</div><!-- /.box -->

		</div><!-- /.col-md-6 -->

	</div><!-- /.row -->

	<!-- ====================================== -->
</section><!-- /.content -->
*/ ?>