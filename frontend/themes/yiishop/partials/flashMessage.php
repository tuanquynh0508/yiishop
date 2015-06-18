<?php

use yii\web\View;

$this->registerJs("
window . setTimeout(function() {
	$('.alert-box').fadeTo(500, 0).slideUp(500, function() {
		$(this).remove();
	});
}, 5000);
", View::POS_END);

foreach (Yii::$app->session->getAllFlashes() as $key => $message) {	
	echo '<div class="alert-box alert-' . $key . '">';
	echo $message;
	echo '</div>';
}
