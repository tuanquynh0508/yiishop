<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'firm_id') ?>

    <?= $form->field($model, 'upc') ?>

    <?= $form->field($model, 'slug') ?>

    <?= $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'wholesale_prices') ?>

    <?php // echo $form->field($model, 'retail_price') ?>

    <?php // echo $form->field($model, 'cost') ?>

    <?php // echo $form->field($model, 'made') ?>

    <?php // echo $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'out_of_stock') ?>

    <?php // echo $form->field($model, 'is_new') ?>

    <?php // echo $form->field($model, 'is_special') ?>

    <?php // echo $form->field($model, 'views') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'del_flg') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
