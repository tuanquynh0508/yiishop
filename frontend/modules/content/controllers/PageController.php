<?php

namespace frontend\modules\content\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use common\models\Page;
use frontend\components\CController;

class PageController extends CController
{
    public function actionView()
    {
		$slug = Yii::$app->getRequest()->getQueryParam('slug');

		$pageModel = Page::find()->where('slug = :slug', [':slug' => $slug])->visible()->one();

		if (null === $pageModel) {
            throw new NotFoundHttpException(Yii::t('app', 'Record not found.'));
        }

        return $this->render('view', array(
			'pageModel' => $pageModel
		));
    }

}
