<?php
use yii\helpers\Html;

$baseUrl = Yii::$app->request->baseUrl;
?>
<div id="slideTop">
		<div id="slideTopWrapper">
				<div class="slideTopWrapper-Item">
						<a href="#" title="Slide 1">
								<?php echo Html::img($baseUrl . '/yiishop/slide/s-1.png', []); ?>
						</a>
				</div><!-- /.slideTopWrapper-Item -->
				<div class="slideTopWrapper-Item">
						<a href="#" title="Slide 2">
								<?php echo Html::img($baseUrl . '/yiishop/slide/s-2.png', []); ?>
						</a>
				</div><!-- /.slideTopWrapper-Item -->
				<div class="slideTopWrapper-Item">
						<a href="#" title="Slide 3">
								<?php echo Html::img($baseUrl . '/yiishop/slide/s-3.png', []); ?>
						</a>
				</div><!-- /.slideTopWrapper-Item -->
				<div class="slideTopWrapper-Item">
						<a href="#" title="Slide 4">
								<?php echo Html::img($baseUrl . '/yiishop/slide/s-4.png', []); ?>
						</a>
				</div><!-- /.slideTopWrapper-Item -->
				<div class="slideTopWrapper-Item">
						<a href="#" title="Slide 5">
								<?php echo Html::img($baseUrl . '/yiishop/slide/s-5.png', []); ?>
						</a>
				</div><!-- /.slideTopWrapper-Item -->
		</div><!-- /#slideTopWrapper -->
		<a href="#" class="btn-link-img" id="slideTopWrapperPrev"><span>Prev</span></a>
		<a href="#" class="btn-link-img" id="slideTopWrapperNext"><span>Next</span></a>
</div><!-- /#slideTop -->
