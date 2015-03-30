<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;


/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = Yii::t('user', 'Login');
$this->params['breadcrumbs'][] = $this->title;

$baseUrl = Yii::$app->request->baseUrl;
$this->registerCssFile($baseUrl.'/adminlte/plugins/iCheck/square/blue.css', ['depends' => [\backend\assets\AdminlteAsset::className()]]);
$this->registerJsFile($baseUrl.'/adminlte/plugins/iCheck/icheck.min.js', ['depends' => [\yii\bootstrap\BootstrapPluginAsset::className()]]);
$this->registerJs("
$(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
});
", View::POS_END);

$this->registerCss("
body { background: url(".$baseUrl."/adminlte/dist/img/bg-login.jpg) !important; }
");
?>

<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><?= Html::encode($this->title) ?></a>
  </div><!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><?= Yii::t('user', 'Please fill out the following fields to login') ?></p>
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
      <div class="form-group has-feedback">
        <?= $form->field($model, 'username') ?>
      </div>
      <div class="form-group has-feedback">
        <?= $form->field($model, 'password')->passwordInput() ?>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <?= $form->field($model, 'rememberMe')->checkbox() ?>
          </div>
        </div><!-- /.col -->
        <div class="col-xs-4">
          <?= Html::submitButton(Yii::t('user', 'Login Submit'), ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
        </div><!-- /.col -->
      </div>
    <?php ActiveForm::end(); ?>
  </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

