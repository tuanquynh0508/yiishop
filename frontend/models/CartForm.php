<?php

namespace frontend\models;

use \Yii;
use yii\base\Model;
use yii\web\Session;
use common\models\Product;

/**
 * ContactForm is the model behind the contact form.
 */
class CartForm extends Model {

	public $productId;
	public $quantity;

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['productId', 'quantity'], 'required'],
			[['productId', 'quantity'], 'integer'],
			[['productId'], 'checkExisted'],
			[['productId'], 'checkCartExisted', 'on' => 'delete'],
			[['productId'], 'checkCartExisted', 'on' => 'update'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'productId' => 'Mã sản phẩm',
			'quantity' => 'Số lượng',
		];
	}
	
	public function checkExisted($attribute, $params) {
		$id = $this->$attribute;
		$product = Product::find()
        ->where('id = :id', [':id' => $id])
        ->limit(1)
        ->visible()
        ->one();
		if (null === $product) {
			$this->addError($attribute, 'Không có sản phẩm này.');
		}
	}
	
	public function checkCartExisted($attribute, $params) {
		$cart = $this->getCart();
		if (!array_key_exists($this->$attribute, $cart)) {
			$this->addError($attribute, 'Trong giỏ hàng không có sản phẩm này.');
		}
	}

	// PUBLIC---------------------------------------------------------------------
	public function getCart() {
		$session = new Session;

		if (!$session->isActive) {
			$session->open();
		}
		
		// Get from session
		$cart = $session->get('shopping_cart');
		if (null === $cart) {
			$cart = array();
		}
		
		return $cart;
	}
	public function addCart() {
		$session = new Session;
		$cart = $this->getCart();
		// Add in list if not existed
		if (array_key_exists($this->productId, $cart)) {
			$cart[$this->productId] = $cart[$this->productId] + $this->quantity;
		} else {
			$cart[$this->productId] = $this->quantity;
		}

		$session->set('shopping_cart', $cart);
	}
	
	public function deleteCart() {
		$session = new Session;
		$cart = $this->getCart();
		// Add in list if not existed
		if (array_key_exists($this->productId, $cart)) {
			unset($cart[$this->productId]);
		}

		$session->set('shopping_cart', $cart);
	}
	
	public function updateCart() {
		$session = new Session;
		$cart = $this->getCart();
		// Add in list if not existed
		if (array_key_exists($this->productId, $cart)) {
			$cart[$this->productId] = $this->quantity;
		}

		$session->set('shopping_cart', $cart);
	}
	
	public function clearCart() {
		$session = new Session;

		if (!$session->isActive) {
			$session->open();
		}
		
		$session->set('shopping_cart', array());
	}

}
