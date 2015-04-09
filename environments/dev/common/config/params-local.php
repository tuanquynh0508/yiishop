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
			'width' => 250,
			'height' => 250,
		],
		'normal' => [
			'prefix' => 'bg_',
			'width' => 500,
			'height' => 500,
		],
	],
	'upload_path' => [
		'category' => '@root/uploads/category/',
		'product' => '@root/uploads/product/',
	]
];
