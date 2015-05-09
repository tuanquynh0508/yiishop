<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- ZONE-1================================================================= -->
<?php $this->beginBlock('zone-1'); ?>

	<?php echo yii\base\View::render('//partials/categoryMenu',array()); ?>

<?php $this->endBlock(); ?>

<!-- ZONE-2================================================================= -->
<?php $this->beginBlock('zone-2'); ?>

	<?php echo yii\base\View::render('//partials/topMenu',array()); ?>

	<ul class="breadcrumb">
		<li><a href="/backend/">Trang chủ</a></li>
		<li><a href="/backend/product/default/index">Products</a></li>
		<li class="active">Sản phẩm 3</li>
	</ul>

	<div class="site-contact">
		<h1><?= Html::encode($this->title) ?></h1>

		<p>
			If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
		</p>

		<div class="row">
			<div class="col-lg-5">
				<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
					<?= $form->field($model, 'name') ?>
					<?= $form->field($model, 'email') ?>
					<?= $form->field($model, 'subject') ?>
					<?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
					<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
						'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
					]) ?>
					<div class="form-group">
						<?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
					</div>
				<?php ActiveForm::end(); ?>
			</div>
		</div>

	</div>

<?php $this->endBlock(); ?>

<!-- ZONE-3================================================================= -->
<?php //$this->beginBlock('zone-3'); ?>

<?php //$this->endBlock(); ?>