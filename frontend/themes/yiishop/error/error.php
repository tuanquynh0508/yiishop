<?php
use yii\helpers\Html;

$this->title = 'Error '.$exception->statusCode;
?>

<div class="error-page">
	<h1><?= $exception->statusCode ?></h1>
	<div class="error-content">
		<h3><i class="fa fa-warning text-yellow"></i> <?= nl2br(Html::encode($message)) ?></h3>
		<p>
			Có lỗi xảy ra, bạn có thể quay về <a href="javascript:history.back();">trang trước</a> 
			hoặc click <a href="<?= Yii::$app->homeUrl ?>">vào đây</a> để quay về trang chủ.
		</p>
	</div><!-- /.error-content -->
</div><!-- /.error-page -->