<?php
/* @var $this yii\web\View */

$this->title = 'My Yii Application';

$baseUrl = Yii::$app->request->baseUrl;
$this->registerJsFile($baseUrl.'/adminlte/plugins/slimScroll/jquery.slimscroll.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile($baseUrl.'/adminlte/plugins/fastclick/fastclick.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>

