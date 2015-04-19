<?php

use yii\web\View;

$baseUrl = Yii::$app->request->baseUrl;
$this->registerCssFile($baseUrl.'/adminlte/plugins/plupload/jquery.ui.plupload/css/jquery.ui.plupload.css', ['depends' => [\backend\assets\AdminlteAsset::className(), backend\assets\JqueryUiAsset::className()]]);
$this->registerJsFile($baseUrl.'/adminlte/plugins/plupload/plupload.full.min.js', ['depends' => [\yii\bootstrap\BootstrapPluginAsset::className(), backend\assets\JqueryUiAsset::className()]]);
$this->registerJsFile($baseUrl.'/adminlte/plugins/plupload/jquery.ui.plupload/jquery.ui.plupload.js', ['depends' => [\yii\bootstrap\BootstrapPluginAsset::className(), backend\assets\JqueryUiAsset::className()]]);
$this->registerJsFile($baseUrl.'/adminlte/plugins/plupload/i18n/vi.js', ['depends' => [\yii\bootstrap\BootstrapPluginAsset::className(), backend\assets\JqueryUiAsset::className()]]);

$this->registerJs("
// Initialize the widget when the DOM is ready
$(function() {
    // Setup html5 version
    var uploader = $('#uploader').plupload({
        // General settings
        runtimes : 'html5,flash,silverlight,html4',
        url : '$baseUrl/upload.php',         
        chunk_size : '1mb',		
        rename : true,
		unique_names : true,
        dragdrop: true,		
        sortable: true,
		views: {
            list: true,
            thumbs: true, // Show thumbs
            active: 'thumbs'
        },         
        filters : {
            // Maximum file size
            max_file_size : '2mb',
            // Specify what files to browse for
            mime_types: [
                {title : 'Image files', extensions : 'jpg,gif,png'},
            ]
        },
		// Resize images on client-side if we can
        //resize : {width : 640, height : 480, quality : 1000},
        // Flash settings
        flash_swf_url : '$baseUrl/adminlte/plugins/plupload/Moxie.swf',     
        // Silverlight settings
        silverlight_xap_url : '$baseUrl/adminlte/plugins/plupload/Moxie.xap'
    });
	
UploadComplete: function(up, files) {
                // Called when all files are either uploaded or failed
                log('[UploadComplete]');
            },
});

function showModalUpload() {    
    $('#modalUpload').modal({
        backdrop: 'static'
    }).on('shown.bs.modal', function (e) {
		uploader.refresh();
    }).on('hidden.bs.modal', function (e) {
        //$('.btnAddEvent',$(this)).off();
    }).modal('show');
}
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
		  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Bỏ qua</button>
		  <button type="button" class="btn btn-primary">Đồng ý</button>
		</div>
	  </div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
