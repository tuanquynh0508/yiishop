<?php

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use common\models\Product;

class tabProductWidget extends Widget
{
//	public function init(){
//		parent::init();
//	}

	public function run(){
		$listNewProduct = Product::find()
				->where('is_new = :is_new', [':is_new' => 1])
				->andWhere('is_special = :is_special', [':is_special' => 0])
				->orderBy(['created_at' => SORT_DESC])
				->visible()
				->limit(8)
				->all();

		$listSaleProduct = Product::find()
				->where('is_special = :is_special', [':is_special' => 1])
				->orderBy(['created_at' => SORT_DESC])
				->visible()
				->limit(8)
				->all();

		$listPopularProduct = Product::find()
				->where('is_new = :is_new', [':is_new' => 0])
				->andWhere('is_special = :is_special', [':is_special' => 0])
				->orderBy(['views' => SORT_DESC, 'created_at' => SORT_DESC])
				->visible()
				->limit(8)
				->all();

		return $this->render('tabProduct', [
			'newProducts' => $listNewProduct,
			'saleProduct' => $listSaleProduct,
			'popularProduct' => $listPopularProduct,
		]);
	}

}


