<?php

namespace frontend\modules\product\controllers;

use \Yii;
use yii\web\NotFoundHttpException;
//use yii\web\Controller;
use frontend\components\CController;
use common\models\Product;
use frontend\models\CartForm;
use yii\filters\VerbFilter;

class CartController extends CController {
	
	//http://www.yiiframework.com/doc-2.0/yii-filters-verbfilter.html
	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [
				'verbs' => [
						'class' => VerbFilter::className(),
						'actions' => [
								'add' => ['post'],
								'update' => ['post'],
								'delete' => ['post'],
								'list' => ['get'],
						],
				],
		];
	}
	
	public function actionCheckout() {		
		$cart = new CartForm();
		$cartList = $cart->getCart();
		
		$productList = Product::find()
			->where(['in','id',array_keys($cartList)])
			->visible()
			->all();
		
		return $this->render('checkout', [
			'totalProduct' => array_sum($cartList),
			'cartList' => $cartList,
			'productList' => $productList,
		]);
	}
	
	// AJAX ACTION----------------------------------------------------------------
	//https://github.com/samdark/yii2-cookbook/blob/master/book/response-formats.md
	public function actionAdd() {
		//$this->enableCsrfValidation = false;
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		
		$jsonFail = array('status' => 'fail', 'message' => ':)');
		$jsonSuccess = array('status' => 'success',	'message' => 'Đã thêm vào giỏ hàng');
		
		$form = new CartForm();
		if ($form->load($request->post())) {			
			if($form->validate()) {
				$form->addCart();
				$jsonSuccess['product'] = $this->getProduct($form->productId);
				return $jsonSuccess;
			} else {
				$jsonFail['message'] = $form->errors;
				return $jsonFail;
			}			
		}		
		
		return $jsonFail;
	}
	
	public function actionDelete() {
		//$this->enableCsrfValidation = false;
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		
		$jsonFail = array('status' => 'fail', 'message' => ':)');
		$jsonSuccess = array('status' => 'success',	'message' => 'Đã xóa sản phẩm khỏi giỏ hàng');
		
		$form = new CartForm();
		$form->scenario = 'delete';
		if ($form->load($request->post())) {			
			if($form->validate()) {
				$jsonSuccess['product'] = $this->getProduct($form->productId);
				$form->deleteCart();
				return $jsonSuccess;
			} else {
				$jsonFail['message'] = $form->errors;
				return $jsonFail;
			}			
		}		
		
		return $jsonFail;
	}
	
	public function actionUpdate() {
		//$this->enableCsrfValidation = false;
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		
		$jsonFail = array('status' => 'fail', 'message' => ':)');
		$jsonSuccess = array('status' => 'success',	'message' => 'Đã cập nhật giỏ hàng');
		
		$form = new CartForm();
		$form->scenario = 'delete';
		if ($form->load($request->post())) {			
			if($form->validate()) {
				$form->updateCart();
				$jsonSuccess['product'] = $this->getProduct($form->productId);
				return $jsonSuccess;
			} else {
				$jsonFail['message'] = $form->errors;
				return $jsonFail;
			}			
		}		
		
		return $jsonFail;
	}
	
	// PRIVATE--------------------------------------------------------------------
	private function getProduct($id) {
		$product = Product::find()
        ->where('id = :id', [':id' => $id])
        ->limit(1)
        ->visible()
        ->one();
		
		if($product->retail_price == 0) {
			$price = 0;
		} else if($product->getSalePrice() != 0) {
			$price = intval($product->getSalePrice());
		} else {
			$price = intval($product->retail_price);
		}
		
		$cart = new CartForm();
		$cartList = $cart->getCart();
		$quantity = $cartList[$product->id];
		
		$oProduct = new \stdClass();
		$oProduct->id = $product->id;
		$oProduct->title = $product->title;
		$oProduct->thumb = $product->getDefaultImg('s');
		$oProduct->url = Yii::$app->urlManager->createUrl(['product/default/detail', 'cateslug' =>$product->categories[0]->slug, 'slug' => $product->slug]);
		$oProduct->price = $price;
		$oProduct->quantity = $quantity;
		$oProduct->totalPrice = $price*$quantity;
		return $oProduct;
	}
}