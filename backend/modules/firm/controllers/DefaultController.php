<?php

namespace backend\modules\firm\controllers;

use Yii;
use backend\components\CController;
use common\models\Firm;
use backend\models\FirmSearch;
use yii\web\NotFoundHttpException;

class DefaultController extends CController {

	public function actionIndex() {
		$searchModel = new FirmSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
					'searchModel' => $searchModel,
					'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Creates a new Firm model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new Firm();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			Yii::$app->session->setFlash('success', Yii::t('backend', 'Create successful.'));
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('create', [
						'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing Firm model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id) {
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			Yii::$app->session->setFlash('success', Yii::t('backend', 'Update successful.'));
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('update', [
						'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing Firm model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id) {
		$this->findModel($id)->delete();
		Yii::$app->session->setFlash('warning', Yii::t('backend', 'Delete successful.'));
		return $this->redirect(['index']);
	}

	/**
	 * Displays a single Firm model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id) {
		return $this->render('view', [
					'model' => $this->findModel($id),
		]);
	}

	/**
	 * Finds the Firm model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Firm the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = Firm::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

}
