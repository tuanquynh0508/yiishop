<?php

namespace frontend\widgets;

use \Yii;
use yii\base\Widget;
use yii\helpers\Html;

class productRandomWidget extends Widget
{

	public function init(){
		parent::init();
	}

	public function run(){
		return $this->render('productRandom', []);
	}
}

