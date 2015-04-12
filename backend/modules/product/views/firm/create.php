<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Firm */

$this->title = Yii::t('app', 'Create Firm');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Firms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">

	<?=
	$this->render('_form', [
		'model' => $model,
	])
	?>

</section><!-- /.content -->
