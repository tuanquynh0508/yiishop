<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = Yii::t('app', 'Thêm mới Danh mục');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Content Wrapper. Contains page content -->
<section class="content">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</section><!-- /.content -->
