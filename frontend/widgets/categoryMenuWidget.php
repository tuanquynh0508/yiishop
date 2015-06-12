<?php

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use common\models\Category;

class categoryMenuWidget extends Widget
{
//	public function init(){
//		parent::init();
//	}

	public function run(){
		$categories = Category::staticGetTreeCategory(0, 1, "", true);

		return $this->render('categoryMenu', [
			'categories' => $categories
		]);
	}
}

