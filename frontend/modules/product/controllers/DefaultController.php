<?php

namespace frontend\modules\product\controllers;

//use yii\web\Controller;
use frontend\components\CController;

class DefaultController extends CController
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
