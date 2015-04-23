<?php

use yii\web\View;

$baseUrl = Yii::$app->request->baseUrl;
$this->registerCssFile($baseUrl . '/adminlte/plugins/dmupload/dmuploader.css', ['depends' => [\backend\assets\AdminlteAsset::className()]]);
$this->registerJsFile($baseUrl . '/adminlte/plugins/dmupload/dmuploader.min.js', ['depends' => [\yii\bootstrap\BootstrapPluginAsset::className()]]);
$this->registerJs("
$(function () {
	$('input[type=\"checkbox\"].minimal-red, input[type=\"radio\"].minimal-red').iCheck({
		checkboxClass: 'icheckbox_minimal-red',
		radioClass: 'iradio_minimal-red'
	});
});
", View::POS_END);
?>
<!-- D&D Markup -->
<div id="drag-and-drop-zone" class="uploader">
	<div>Kéo &amp; thả ảnh vào đây</div>
	<div class="or">-hoặc-</div>
	<div class="browser">
		<label>
			<span>Chọn file từ máy tính của bạn</span>
			<input type="file" name="files[]" multiple="multiple" title='Click to add Files'>
		</label>
	</div>
</div>
<!-- /D&D Markup -->

<div class="clearfix tq-image-list">

	<div class="tq-image-item margin">
		<div class="clearfix btnTools">
			<div class="pull-left text-left margin">
				<input type="radio" class="flat-red" name="" value="" />
			</div>
			<div class="pull-right text-right margin">
				<i class="fa fa-trash-o text-danger"></i>
			</div>
		</div>
		<img src="<?php echo $baseUrl; ?>/Apple-II-Computer.jpg"/>
<!--		<div class="progress progress-sm active">
			<div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
				<span class="sr-only">60% Complete (warning)</span>
			</div>
		</div>-->
	</div>

</div>