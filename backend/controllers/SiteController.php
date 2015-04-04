<?php
namespace backend\controllers;

use yii\web\Controller;
use backend\components\CController;

/**
 * Site controller
 */
class SiteController extends CController
{

    public function actionIndex()
    {
        //$this->layout = 'adminlte';
        return $this->render('index');
    }

}
