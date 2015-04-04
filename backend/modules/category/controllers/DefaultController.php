<?php

namespace backend\modules\category\controllers;

//use yii\web\Controller;
use backend\components\CController;

class DefaultController extends CController {

	public function actionIndex() {
		return $this->render('index');
	}
	
	public function actionCreate() {
		$model = new Category();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
	}

}
