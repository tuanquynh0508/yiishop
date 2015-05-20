<?php

return [
	'upload_var' => [
		'max_size' => 10 * 1024 * 1024,
		'small' => [
			'prefix' => 'sm_',
			'width' => 100,
			'height' => 100,
		],
		'medium' => [
			'prefix' => 'md_',
			'width' => 300,
			'height' => 300,
		],
		'normal' => [
			'prefix' => '',
			'width' => 600,
			'height' => 600,
		],
	],
	'upload_path' => [
		'category' => '@root/uploads/category/',
		'product' => '@root/uploads/product/',
	]
];
