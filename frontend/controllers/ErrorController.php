<?php
namespace frontend\controllers;

use frontend\components\CController;

/**
 * Error controller
 */
class ErrorController extends CController
{
	public $layout = '//errorLayout';

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

	public function actionUnderConstruction()
    {
      return $this->render('underConstruction');
    }
}
