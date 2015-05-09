<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
			//'enableStrictParsing' => false,
            //'suffix' => '.html',
        ],
		'utility' => [
			'class' => 'common\components\Utility',
		],
    ],
];
