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
					'@app/views' => '@app/themes/cuahangnhua',
					'@app/modules' => '@app/themes/cuahangnhua/modules',
					'@app/widgets' => '@app/themes/cuahangnhua/widgets',
				],
				'baseUrl' => '@web/themes/cuahangnhua',
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
			'suffix' => '.html',
            'rules' => [
				'/product/detail/<slug:[A-Za-z0-9 -_.]+>' => 'product/default/detail',
				'/product/shopping_cart' => 'product/default/shopping-cart',
				'/product/<cateslug:[A-Za-z0-9 -_.]+>' => 'product/default/category',
				'/contact' => 'site/contact',
				'/page/under_construction' => 'error/underConstruction',
				'/page/<slug:[A-Za-z0-9 -_.]+>' => 'content/page/view',
            ],
        ],
    ],
    'params' => $params,
];
