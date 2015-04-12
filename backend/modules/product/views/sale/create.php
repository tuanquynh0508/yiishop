<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Sale */

$this->title = Yii::t('app', 'Thêm Giảm giá');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</section><!-- /.content -->
