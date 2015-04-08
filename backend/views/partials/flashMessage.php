<?php

use yii\web\View;

$this->registerJs("
window . setTimeout(function() {
	$('.alert-dismissable').fadeTo(500, 0).slideUp(500, function() {
		$(this).remove();
	});
}, 5000);
", View::POS_END);

foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
	$icon = '';
	switch ($key) {
		case 'danger':
			$icon = 'fa-ban';
			break;
		case 'info':
			$icon = 'fa-info';
			break;
		case 'warning':
			$icon = 'fa-warning';
			break;
		case 'success':
			$icon = 'fa-check';
			break;
		default:
			break;
	}
	echo '<div class="alert alert-' . $key . ' alert-dismissable">';
	echo '	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
	echo '	<h4><i class="icon fa ' . $icon . '"></i> Thông báo</h4>';
	echo $message;
	echo '</div>';
}
