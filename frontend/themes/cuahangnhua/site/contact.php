<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Liên hệ';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- ZONE-1================================================================= -->
<?php $this->beginBlock('zone-1'); ?>

	<?= frontend\widgets\categoryMenuWidget::widget([]) ?>

<?php $this->endBlock(); ?>

<!-- ZONE-2================================================================= -->
<?php $this->beginBlock('zone-2'); ?>

	<?php echo yii\base\View::render('//partials/topMenu',array()); ?>

	<?= Breadcrumbs::widget([
		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
	]) ?>

	<div class="page-header">
		<h1><?= Html::encode($this->title) ?></h1>
	</div>
	
	<div class="row">
		
		<div class="col-sm-6 col-lg-6 col-md-6">
			<p><strong>ĐỒ GIA DỤNG PHONG THỦY</strong></p>
			<p><strong>quận Hà Đông, Hà Nội</strong></p>
			<p><strong>Điện thoại:</strong> 04-123456789 - <strong>Fax:</strong> 04-123456789</p>
			<p><strong>Enail:</strong> <a href="mailto:sale@dogiadungphongthuy.com">sale@dogiadungphongthuy.com</a></p>
			
			<div class="thumbnail" style="display: inline-block;">
			<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:400px;width:350px;"><div id="gmap_canvas" style="height:400px;width:350px;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://www.map-embed.com" id="get-map-data">www.map-embed.com</a></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:16,center:new google.maps.LatLng(20.96597560777687,105.77701096511237),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(20.96597560777687, 105.77701096511237)});infowindow = new google.maps.InfoWindow({content:"<b>&#272;&#7891; Gia D&#7909;ng Phong Th&#7911;y</b><br/>H&agrave; C&#7847;u<br/> H&agrave; &#272;&ocirc;ng" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
			</div>
		</div>
		
		<div class="col-sm-6 col-lg-6 col-md-6">
			
			<div class="site-contact">
				<p>
					Nếu bạn cần liên hệ kinh doanh hoặc có câu hỏi cho chúng tôi. Xin vui lòng điền đầy đủ thông tin theo form dưới đây. Và bấm vào nút "Gửi liên hệ" để gửi thông tin đến chúng tôi. Cảm ơn!.
				</p>
				
				<?php  echo yii\base\View::render('//partials/flashMessage', array()); ?>

				<div class="row">
					<div class="col-lg-12">
						<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
							<?= $form->field($model, 'name') ?>
							<?= $form->field($model, 'email') ?>
							<?= $form->field($model, 'subject') ?>
							<?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
							<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
								'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
							]) ?>
							<div class="form-group">
								<?= Html::submitButton('Gửi liên hệ', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
							</div>
						<?php ActiveForm::end(); ?>
					</div>
				</div>

			</div>
			
		</div>
		
	</div>

<?php $this->endBlock(); ?>

<!-- ZONE-3================================================================= -->
<?php //$this->beginBlock('zone-3'); ?>

<?php //$this->endBlock(); ?>
