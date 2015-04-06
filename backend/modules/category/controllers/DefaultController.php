<?php

namespace backend\modules\category\controllers;

use Yii;
//use yii\web\Controller;
use backend\components\CController;
use common\models\Category;
use backend\models\CategorySearch;
use yii\web\NotFoundHttpException;

class DefaultController extends CController {

	public function actionIndex() {
		$searchModel = new CategorySearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
					'searchModel' => $searchModel,
					'dataProvider' => $dataProvider,
		]);
		//return $this->render('index');
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
