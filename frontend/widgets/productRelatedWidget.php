<?php

namespace frontend\widgets;

use \Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\web\Session;

use common\models\Product;

class productRelatedWidget extends Widget
{
	public function init(){
		parent::init();
	}

	public function run(){
		return $this->render('productRelated', []);
	}
}

