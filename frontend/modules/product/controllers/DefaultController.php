<?php

namespace frontend\modules\product\controllers;

use \Yii;
use yii\web\NotFoundHttpException;
//use yii\web\Controller;
use frontend\components\CController;
use common\models\Product;
use common\models\Category;
use yii\data\Pagination;
use yii\web\Session;

class DefaultController extends CController {

	public function actionIndex() {
		$this->layout = '//oneColumn';
		$listCategory = Category::find()
						->where('parent_id IS NULL')
						->visible()
						->all();

		return $this->render('index', [
								'listCategory' => $listCategory
		]);
	}

	public function actionCategory() {
		$this->layout = '//twoLeftColumn';
		//http://www.yiiframework.com/doc-2.0/yii-data-pagination.html
		$categorySlug = Yii::$app->getRequest()->getQueryParam('cateslug');

		$category = Category::find()->where('slug = :slug', [':slug' => $categorySlug])->visible()->one();
		if (null === $category) {
			throw new NotFoundHttpException(Yii::t('app', 'Record not found.'));
		}

		//Get all child category
		$categoriesId = [$category->id];
		$categoriesId = array_merge($categoriesId, Category::getListChildId($category->id));

		$query = Product::find()
						->joinWith('categories', false, 'LEFT JOIN')
						->where(['{{%category}}.id' => $categoriesId])
						->orderBy([Product::tableName() . '.created_at' => SORT_DESC])
						->visible(0, Product::tableName());

		$countQuery = clone $query;
		$totalItem = $countQuery->count();
		$pagination = new Pagination([
				'totalCount' => $totalItem,
				'pageSize' => 10,
		]);

		$products = $query->offset($pagination->offset)
						->limit($pagination->limit)
						->all();

		return $this->render('category', [
								'category' => $category,
								'products' => $products,
								'pagination' => $pagination,
								'totalItem' => $totalItem
		]);
	}

	public function actionDetail() {
		$slug = Yii::$app->getRequest()->getQueryParam('slug');

		$product = Product::find()->where('slug = :slug', [':slug' => $slug])->visible()->one();

		if (null === $product) {
			throw new NotFoundHttpException(Yii::t('app', 'Record not found.'));
		}

		$product->incrementViews();

		$this->addProductSession($product->id);

		return $this->render('detail', [
								'product' => $product
		]);
	}

	public function actionShoppingCart() {
		return $this->render('shopping_cart');
	}

	// PRIVATE-----------------------------------------------------
	private function addProductSession($productId) {
		$session = new Session;

		if (!$session->isActive) {
			$session->open();
		}

		// Get from session
		$listProductView = $session->get('list_product_view');
		if (null === $listProductView) {
			$listProductView = array();
		}

		// Add in list if not existed
		if (!in_array($productId, $listProductView)) {
			array_unshift($listProductView, $productId);
		}

		// Remove item if list length great than 8
		if (count($listProductView) > 8) {
			array_pop($listProductView);
		}

		$session->set('list_product_view', $listProductView);
	}

}
