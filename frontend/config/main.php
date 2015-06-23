<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
		'id' => 'app-frontend',
		'basePath' => dirname(__DIR__),
		'bootstrap' => ['log'],
		'controllerNamespace' => 'frontend\controllers',
		'defaultRoute' => '/product/default/index',
		'modules' => [
				'product' => [
						'class' => 'frontend\modules\product\Product',
				],
				'content' => [
						'class' => 'frontend\modules\content\Content',
				],
		],
		'components' => [
				'view' => [
						'theme' => [
								'pathMap' => [
										'@app/views' => '@app/themes/yiishop',
										'@app/modules' => '@app/themes/yiishop/modules',
										'@app/widgets' => '@app/themes/yiishop/widgets',
								],
								'baseUrl' => '@web/themes/yiishop',
						],
				],
				'user' => [
						'identityClass' => 'common\models\User',
						'enableAutoLogin' => true,
				],
				'log' => [
						'traceLevel' => YII_DEBUG ? 3 : 0,
						'targets' => [
								[
										'class' => 'yii\log\FileTarget',
										'levels' => ['error', 'warning'],
								],
						],
				],
				'errorHandler' => [
						'errorAction' => 'error/error',
				],
				'urlManager' => [
						//'suffix' => '.html',
						'rules' => [
								'/product/<cateslug:[A-Za-z0-9 -_.]+>/<slug:[A-Za-z0-9 -_.]+>.html' => 'product/default/detail',
								'/cart/<action:(add|update|delete|list)>.json' => 'product/cart/<action>',
								'/cart/checkout.html' => 'product/cart/checkout',
								'/product/<cateslug:[A-Za-z0-9 -_.]+>' => 'product/default/category',
								'/contact.html' => 'site/contact',
								'/under_construction.html' => 'error/under-construction',
								'/page/<slug:[A-Za-z0-9 -_.]+>.html' => 'content/page/view',
						],
				],
				'assetManager' => [
						'bundles' => [
								'yii\web\JqueryAsset' => [
										'sourcePath' => null, // do not publish the bundle
										'js' => [
												'yiishop/js/jquery.min.js',
												'yiishop/js/jquery-migrate.min.js',
										]
								],
						],
				],
		],
		'params' => $params,
];
