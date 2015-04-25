<?php

use yii\web\View;

$baseUrl = Yii::$app->request->baseUrl;
$this->registerCssFile($baseUrl . '/adminlte/plugins/dmupload/dmuploader.css', ['depends' => [\backend\assets\AdminlteAsset::className()]]);
$this->registerJsFile($baseUrl . '/adminlte/plugins/dmupload/dmuploader.min.js', ['depends' => [\yii\bootstrap\BootstrapPluginAsset::className()]]);
$this->registerJs("
var path = '".Yii::getAlias('@img_path/product/'.Yii::$app->params['upload_var']['medium']['prefix'].'/')."';
$(function () {
	$('input[type=\"checkbox\"].minimal-red, input[type=\"radio\"].minimal-red').iCheck({
		checkboxClass: 'icheckbox_minimal-red',
		radioClass: 'iradio_minimal-red'
	});
	
	//DMUPLOADER----------------------------------------------------------------
	//-- Some functions to work with our UI
	function add_log(message)
	{
		var item = 'Time: [' + new Date().getTime() + '] - ' + message;
		//console.log(item);
	}
	
	function update_file_status(id, status, data)
	{
		if(status == 'success') {
			if(data.status == 'success') {
				$('#uploadFile' + id).find('.tq-upload-img').attr('src', path + data.file);
			} else {
				alert(data.message);
			}
		} else {
			alert(data);
		}
	}

	function update_file_progress(id, percent)
	{
		if(percent == '100%') {
			$('#uploadFile' + id).find('div.progress').hide();
		} else {
			$('#uploadFile' + id).find('div.progress-bar').css('width', percent);
			$('#uploadFile' + id).find('div.progress-bar .sr-only').html(percent);
		}
	}
	
	function add_file(id, file)
	{
		var template =	'' +
						'<div class=\"tq-image-item margin pull-left\" id=\"uploadFile' + id + '\">' +
							'<div class=\"clearfix btnTools\">' +
								'<div class=\"pull-left text-left margin\">' +
									'<input type=\"radio\" name=\"\" value=\"\" />' +
								'</div>' +
								'<div class=\"pull-right text-right margin\">' +
									'<i class=\"fa fa-2x fa-trash-o text-danger\"></i>' +
								'</div>' +
							'</div>' +
							'<div class=\"progress progress-sm active\">' +
								'<div class=\"progress-bar progress-bar-primary progress-bar-striped\" role=\"progressbar\" aria-valuenow=\"60\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 0%\">' +
									'<span class=\"sr-only\">0%</span>' +
								'</div>' +
							'</div>' +
							'<img class=\"tq-upload-img\" src=\"".Yii::getAlias('@img_path/md_nopicture.jpg')."\"/>' +
						'</div>';

		$('.tq-image-list').prepend(template);
	}
	
	// Upload Plugin itself
	$('#drag-and-drop-zone').dmUploader({
		url: '".Yii::$app->urlManager->createUrl('/product/default/upload')."',
		dataType: 'json',
		allowedTypes: 'image/*',
		/*extFilter: 'jpg;png;gif',*/
		onInit: function () {
			add_log('Penguin initialized :)');
		},
		onBeforeUpload: function (id) {
			add_log('Starting the upload of #' + id);
		},
		onNewFile: function (id, file) {
			add_log('New file added to queue #' + id);
			add_file(id, file);
		},
		onComplete: function () {
			add_log('All pending tranfers finished');
		},
		onUploadProgress: function (id, percent) {
			var percentStr = percent + '%';
			update_file_progress(id, percentStr);
		},
		onUploadSuccess: function (id, data) {
			add_log('Upload of file #' + id + ' completed');
			add_log('Server Response for file #' + id + ': ' + JSON.stringify(data));
			update_file_status(id, 'success', data);
			update_file_progress(id, '100%');
		},
		onUploadError: function (id, message) {
			add_log('Failed to Upload file #' + id + ': ' + message);
			update_file_status(id, 'error', message);
		},
		onFileTypeError: function (file) {
			add_log('File \'' + file.name + '\' cannot be added: must be an image');
			update_file_status('', 'error', 'File \'' + file.name + '\' cannot be added: must be an image');
		},
		onFileSizeError: function (file) {
			add_log('File \'' + file.name + '\' cannot be added: size excess limit');
		},
		onFileExtError: function(file){
			update_file_status('', 'error', 'File \'' + file.name + '\' has a Not Allowed Extension');
		},
		onFallbackMode: function (message) {
			update_file_status('', 'error', 'Browser not supported(do something else here!): ' + message);
		}
	});
	//DMUPLOADER END------------------------------------------------------------
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

	<div class="tq-image-item margin pull-left">
		<div class="clearfix btnTools">
			<div class="pull-left text-left margin">
				<input type="radio" name="" value="" />
			</div>
			<div class="pull-right text-right margin">
				<i class="fa fa-2x fa-trash-o text-danger"></i>
			</div>
		</div>
		<img src="<?php echo Yii::getAlias('@img_path/md_nopicture.jpg'); ?>"/>
<!--		<div class="progress progress-sm active">
			<div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
				<span class="sr-only">60% Complete (warning)</span>
			</div>
		</div>-->
	</div>

</div>