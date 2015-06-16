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
			'width' => 400,
			'height' => 400,
		],
		'normal' => [
			'prefix' => '',
			'width' => 1280,
			'height' => 1280,
		],
	],
	'upload_path' => [
		'category' => '@root/uploads/category/',
		'product' => '@root/uploads/product/',
	]
];
