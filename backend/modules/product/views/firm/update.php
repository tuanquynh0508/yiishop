<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Firm */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
			'modelClass' => 'Firm',
		]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Firms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<section class="content">

	<?=
	$this->render('_form', [
		'model' => $model,
	])
	?>

</section><!-- /.content -->
