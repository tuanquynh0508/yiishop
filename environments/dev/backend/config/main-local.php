<?php

$config = [
	'language' => 'vi-VN',
	'components' => [
		'request' => [
			// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
			'cookieValidationKey' => '',
			'enableCsrfValidation' => true,
		],
		'i18n' => [
			'translations' => [
				'*' => [
					'class' => 'yii\i18n\PhpMessageSource'
				],
			],
		],
	],
];

if (!YII_ENV_TEST) {
	// configuration adjustments for 'dev' environment
	$config['bootstrap'][] = 'debug';
	$config['modules']['debug'] = 'yii\debug\Module';

	$config['bootstrap'][] = 'gii';
	//$config['modules']['gii'] = 'yii\gii\Module';
	$config['modules']['gii'] = [
		'class' => 'yii\gii\Module',
		'allowedIPs' => ['127.0.0.1'],
		'generators' => [
			'crud' => [
				'class' => 'yii\gii\generators\crud\Generator',
				'templates' => ['adminlte' => '@common/templates/crud/adminlte']
			]
		]
	];
}

return $config;
