<?php

namespace backend\modules\category\controllers;

//use yii\web\Controller;
use backend\components\MyController;

class DefaultController extends MyController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
