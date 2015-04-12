<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\OptionGroup */

$this->title = Yii::t('app', 'Create Option Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Option Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">

    <?= $this->render('_form', [
        'model' => $model,
		'listOptions' => $listOptions,
    ]) ?>

</section><!-- /.content -->
