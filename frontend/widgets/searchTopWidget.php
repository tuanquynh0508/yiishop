<?php

namespace frontend\widgets;

use \Yii;
use yii\base\Widget;
use yii\helpers\Html;
use common\models\Category;

class searchTopWidget extends Widget
{
	public $sufix = "----";

	public function init(){
		parent::init();
	}

	public function run(){
		$listCategory = Category::staticGetTreeCategory(0, 1, $this->sufix, false);

		$categoryId = Yii::$app->getRequest()->getQueryParam('categoryId');
		$keyword = Yii::$app->getRequest()->getQueryParam('keyword');

		if(null === $categoryId) {
			$categoryId = 0;
		}

		if(null === $keyword) {
			$keyword = '';
		}

		return $this->render('searchTopWidget', [
			'listCategory' => $listCategory,
			'categoryId' => $categoryId,
			'keyword' => $keyword,
		]);
	}
}

