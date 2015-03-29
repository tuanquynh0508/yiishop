<?php
namespace backend\controllers;

use yii\web\Controller;
use backend\components\MyController;

/**
 * Site controller
 */
class SiteController extends MyController
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
