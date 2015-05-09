<?php
use yii\helpers\Html;

$baseUrl = Yii::$app->request->baseUrl;
?>
<div id="carousel-example-generic" class="carousel slide margin-bottom" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
		<li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
		<li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
		<li data-target="#carousel-example-generic" data-slide-to="4" class=""></li>
		<li data-target="#carousel-example-generic" data-slide-to="5" class=""></li>
	</ol>
	<div class="carousel-inner">
		<div class="item active">
			<?php echo Html::img($baseUrl . '/cuahangnhua/slider/a-1.jpg', ['class' => 'img-rounded']); ?>
			<div class="carousel-caption">
				First Slide
			</div>
		</div>
		<div class="item">
			<?php echo Html::img($baseUrl . '/cuahangnhua/slider/a-2.jpg', ['class' => 'img-rounded']); ?>
			<div class="carousel-caption">
				Second Slide
			</div>
		</div>
		<div class="item">
			<?php echo Html::img($baseUrl . '/cuahangnhua/slider/a-3.jpg', ['class' => 'img-rounded']); ?>
			<div class="carousel-caption">
				Third Slide
			</div>
		</div>
		<div class="item">
			<?php echo Html::img($baseUrl . '/cuahangnhua/slider/a-4.jpg', ['class' => 'img-rounded']); ?>
			<div class="carousel-caption">
				Thu 4 Slide
			</div>
		</div>
		<div class="item">
			<?php echo Html::img($baseUrl . '/cuahangnhua/slider/a-5.jpg', ['class' => 'img-rounded']); ?>
			<div class="carousel-caption">
				Thu 5 Slide
			</div>
		</div>
		<div class="item">
			<?php echo Html::img($baseUrl . '/cuahangnhua/slider/a-6.jpg', ['class' => 'img-rounded']); ?>
			<div class="carousel-caption">
				Thu 6 Slide
			</div>
		</div>
	</div>
	<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		<span class="fa fa-chevron-circle-left fa-2x"></span>
	</a>
	<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		<span class="fa fa-chevron-circle-right fa-2x"></span>
	</a>
</div>