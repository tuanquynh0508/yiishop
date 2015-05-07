<?php

namespace frontend\modules\product\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

	public function actionCategory()
    {
        return $this->render('category');
    }

	public function actionDetail()
    {
        return $this->render('detail');
    }

	public function actionShoppingCart()
    {
        return $this->render('shopping_cart');
    }
}
