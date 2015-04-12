<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OptionGroup */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Option Group',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Option Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<section class="content">

    <?= $this->render('_form', [
        'model' => $model,
		'listOptions' => $listOptions,
    ]) ?>

</section><!-- /.content -->
