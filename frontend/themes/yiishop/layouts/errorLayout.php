<?php
use frontend\assets\YiishopAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

YiishopAsset::register($this);

$baseUrl = Yii::$app->request->baseUrl;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title><?= Html::encode($this->title) ?></title>
		<?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
	</head>

	<body id="errorLayout">
		<?php $this->beginBody() ?>
		<div class="container_15" id="pageWrapper">			
			<?= $content ?>
		</div><!-- /#pageWrapper -->		
		<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>