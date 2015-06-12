<?php

namespace frontend\widgets;

use \Yii;
use yii\base\Widget;
use yii\helpers\Html;

use common\models\Product;

class productRandomWidget extends Widget
{

	public function init(){
		parent::init();
	}

	public function run(){
    $product = Product::find()
        ->where('is_new = :is_new', [':is_new' => 1])
        ->andWhere('is_special = :is_special', [':is_special' => 1])
        ->orderBy('RAND()')
        ->limit(1)
        ->visible()
        ->one();

		return $this->render('productRandom', [
      'product' => $product,
    ]);
	}
}

