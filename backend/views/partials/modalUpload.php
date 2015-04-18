<?php

use yii\web\View;

$baseUrl = Yii::$app->request->baseUrl;
$this->registerCssFile($baseUrl.'/adminlte/plugins/plupload/jquery.plupload.queue/css/jquery.plupload.queue.css', ['depends' => [\backend\assets\AdminlteAsset::className()]]);
$this->registerJsFile($baseUrl.'/adminlte/plugins/plupload/plupload.full.min.js', ['depends' => [\yii\bootstrap\BootstrapPluginAsset::className()]]);
$this->registerJsFile($baseUrl.'/adminlte/plugins/plupload/jquery.plupload.queue/jquery.plupload.queue.js', ['depends' => [\yii\bootstrap\BootstrapPluginAsset::className()]]);
$this->registerJsFile($baseUrl.'/adminlte/plugins/plupload/i18n/vi.js', ['depends' => [\yii\bootstrap\BootstrapPluginAsset::className()]]);

$this->registerJs("
// Initialize the widget when the DOM is ready
$(function() {
    // Setup html5 version
    $('#uploader').pluploadQueue({
        // General settings
        runtimes : 'html5,flash,silverlight,html4',
        url : '$baseUrl/upload.php',
         
        chunk_size : '1mb',
        rename : true,
        dragdrop: true,
         
        filters : {
            // Maximum file size
            max_file_size : '2mb',
            // Specify what files to browse for
            mime_types: [
                {title : 'Image files', extensions : 'jpg,gif,png'},
            ]
        },
 
        // Resize images on clientside if we can
        /*resize: {
            width : 200,
            height : 200,
            quality : 90,
            crop: true // crop to exact dimensions
        },*/
 
        // Flash settings
        flash_swf_url : '$baseUrl/adminlte/plugins/plupload/Moxie.swf',
     
        // Silverlight settings
        silverlight_xap_url : '$baseUrl/adminlte/plugins/plupload/Moxie.xap'
    });
});
", View::POS_END);
?>
<div class="modal" id="modalUpload">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <h4 class="modal-title">
			  <i class="fa fa-upload"></i> Tải ảnh lên
		  </h4>
		</div>		  
		<div id="uploader">
			<p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Đóng lại</button>
		  <button type="button" class="btn btn-success">Tải lên</button>
		</div>
	  </div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
