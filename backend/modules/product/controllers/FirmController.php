<?php

namespace backend\modules\product\controllers;

use \Yii;
use backend\components\CController;
use common\models\Firm;
use backend\models\FirmSearch;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class FirmController extends CController {

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
		$pathUpload = Yii::getAlias(Yii::$app->params['upload_path']['category']);

		if (Yii::$app->request->isPost) {
			$file = UploadedFile::getInstance($model, 'logo');
			if ($model->load(Yii::$app->request->post()) && $model->validate()) {
				if ($file) {
					$model->logo = date('YmdHis') . '.' . $file->extension;
				}

				if ($model->save()) {
					if ($file) {
						$file->saveAs($pathUpload . $model->logo);
						Yii::$app->utility->thumbnails($pathUpload . $model->logo, $pathUpload, 'small');
						Yii::$app->utility->thumbnails($pathUpload . $model->logo, $pathUpload, 'medium');
					}

					Yii::$app->session->setFlash('success', Yii::t('app', 'Create successful.'));
					return $this->redirect(['view', 'id' => $model->id]);
				}
			}
		}
		return $this->render('create', [
					'model' => $model,
		]);
	}

	/**
	 * Updates an existing Firm model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id) {
		$model = $this->findModel($id);
		$pathUpload = Yii::getAlias(Yii::$app->params['upload_path']['category']);
		$oldFile = $model->logo;

		if (Yii::$app->request->isPost) {
			$file = UploadedFile::getInstance($model, 'logo');
			if ($model->load(Yii::$app->request->post()) && $model->validate()) {
				if ($file) {
					$model->logo = date('YmdHis') . '.' . $file->extension;
				} else {
					$model->logo = $oldFile;
				}

				if ($model->save()) {
					if ($file) {
						$file->saveAs($pathUpload . $model->logo);
						Yii::$app->utility->thumbnails($pathUpload . $model->logo, $pathUpload, 'small');
						Yii::$app->utility->thumbnails($pathUpload . $model->logo, $pathUpload, 'medium');
						Yii::$app->utility->deleteImgWithThumbnails($oldFile, $pathUpload);
					}

					Yii::$app->session->setFlash('success', Yii::t('app', 'Update successful.'));
					return $this->redirect(['view', 'id' => $model->id]);
				}
			}
		}
		return $this->render('create', [
					'model' => $model,
		]);
	}

	/**
	 * Deletes an existing Firm model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id) {
		$this->findModel($id)->delete();
		Yii::$app->session->setFlash('warning', Yii::t('app', 'Delete successful.'));
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
			throw new NotFoundHttpException(Yii::t('app', 'Record not found.'));
		}
	}

}
