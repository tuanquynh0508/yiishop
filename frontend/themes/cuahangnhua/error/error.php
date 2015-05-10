<?php
use yii\helpers\Html;

$this->title = 'Error '.$exception->statusCode;
?>

<!-- Main content -->
<section class="content">

	<div class="error-page">
		<h2 class="headline text-yellow"> <?= $exception->statusCode ?></h2>
		<div class="error-content">
			<h3><i class="fa fa-warning text-yellow"></i> <?= nl2br(Html::encode($message)) ?></h3>
			<p>
                Có lỗi xảy ra, bạn có thể quay về <a href="javascript:history.back();">trang trước</a> hoặc click <a href="<?= Yii::$app->homeUrl ?>">vào đây</a> để quay về trang chủ.
			</p>
			<form class='search-form'>
                <div class='input-group'>
					<input type="text" name="search" class='form-control' placeholder="Tìm kiếm"/>
					<div class="input-group-btn">
						<button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i></button>
					</div>
                </div><!-- /.input-group -->
			</form>
		</div><!-- /.error-content -->
	</div><!-- /.error-page -->
</section><!-- /.content -->