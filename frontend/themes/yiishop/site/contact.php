<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Thông tin liên hệ';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- zone-before-body======================================================= -->
<?php $this->beginBlock('zone-before-body'); ?>
<?php echo yii\base\View::render('//partials/breadcrumbs',array('classCss' => 'margin-vertical-bottom grid_15')); ?>
<?php $this->endBlock(); ?>

<!-- zone-left-body========================================================= -->
<?php $this->beginBlock('zone-left-body'); ?>
<div class="page-header">
	<h1><?= Html::encode($this->title) ?></h1>
</div>

<div class="clearfix">
	<div class="grid_6 alpha">
		<p>
			<strong>YIISHOP</strong><br/>
			<strong>quận Hà Đông, Hà Nội</strong><br/>
			<strong>Điện thoại:</strong> 04-123456789 - <strong>Fax:</strong> 04-123456789<br/>
			<strong>Enail:</strong> <a href="mailto:sale@i-designer.net">sale@i-designer.net</a>
		</p>
		
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<div style="overflow:hidden;height:450px;width:400px;border:1px solid #ddd;">
			<div id="gmap_canvas" style="height:450px;width:400px;"></div>
			<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
			<a class="google-map-code" href="http://www.map-embed.com/" id="get-map-data">http://www.map-embed.com/</a>
		</div>
		<script type="text/javascript"> function init_map(){var myOptions = {zoom:16,center:new google.maps.LatLng(20.97338759449727,105.77876760969241),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(20.97338759449727, 105.77876760969241)});infowindow = new google.maps.InfoWindow({content:"<b>YiiShop</b><br/>Qu&#7853;n H&agrave; &#272;&ocirc;ng<br/> H&agrave; N&#7897;i" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
	</div>
	<div class="grid_6 omega">
		<div id="contactBox">
				<p>
					Nếu bạn cần liên hệ kinh doanh hoặc có câu hỏi cho chúng tôi. Xin vui lòng điền đầy đủ thông tin theo form dưới đây. Và bấm vào nút "Gửi liên hệ" để gửi thông tin đến chúng tôi. Cảm ơn!.
				</p>
				
				<?php  echo yii\base\View::render('//partials/flashMessage', array()); ?>
				
				<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
					<?= $form->field($model, 'name')->textInput(['class' => 'input-medium']) ?>
					<?= $form->field($model, 'email')->textInput(['class' => 'input-medium']) ?>
					<?= $form->field($model, 'subject')->textInput(['class' => 'input-medium']) ?>
					<?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
					<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
						'template' => '<div class="clearfix"><div class="pull-left">{image}</div><div class="pull-left">{input}</div></div>',
						'options' => [
								'class' => 'input-medium'
						],
						'imageOptions' => [
								'style' => 'margin-right: 10px;cursor: pointer;',
								'data-tooltip' => 'Click để đổi hình khác.'
						]
					])->hint('Không phân biệt hoa thường.') ?>
					<div class="form-group">
						<?= Html::submitButton('Gửi liên hệ', ['class' => 'btn btn-medium btn-base', 'name' => 'contact-button', 'style' => 'min-width: 150px;']) ?>
					</div>
				<?php ActiveForm::end(); ?>

			</div>
	</div>
</div>

<?php $this->endBlock(); ?>

<!-- zone-right-body======================================================== -->
<?php $this->beginBlock('zone-right-body'); ?>
<?php $this->endBlock(); ?>