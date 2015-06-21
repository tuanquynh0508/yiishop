<?php
namespace frontend\widgets;

use \Yii;
use yii\base\Widget;
use yii\helpers\Html;

use common\models\Product;
use frontend\models\CartForm;

class shoppingCartWidget extends Widget
{

	public function init(){
		parent::init();
	}

	public function run(){
		$cart = new CartForm();
		$cartList = $cart->getCart();
		
		$productList = Product::find()
            ->where(['in','id',array_keys($cartList)])
            ->visible()
            ->all();
		
		return $this->render('shoppingCart', [
				'totalProduct' => array_sum($cartList),
				'cartList' => $cartList,
				'productList' => $productList,
		]);
	}
}

