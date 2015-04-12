<?php

namespace backend\modules\product\controllers;

use Yii;
use common\models\OptionGroup;
use backend\models\OptionGroupSearch;
use backend\components\CController;
use yii\web\NotFoundHttpException;

/**
 * OptionController implements the CRUD actions for OptionGroup model.
 */
class OptionController extends CController
{

    /**
     * Lists all OptionGroup models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OptionGroupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new OptionGroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OptionGroup();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			$post = Yii::$app->request->post();
			$model->optionsList = $post['Options'];
			$model->optionsList = $this->formatRelationList($model->optionsList);
			if($model->save()) {
				Yii::$app->session->setFlash('success', Yii::t('app', 'Create successful.'));
				return $this->redirect(['view', 'id' => $model->id]);
			}
        }
		return $this->render('create', [
			'model' => $model,
			'listOptions' => $model->optionsList,
		]);
    }

    /**
     * Updates an existing OptionGroup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$model->getOptionsList();

		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			$post = Yii::$app->request->post();
			$model->optionsList = $post['Options'];
			$model->optionsList = $this->formatRelationList($model->optionsList);
			if($model->save()) {
				Yii::$app->session->setFlash('success', Yii::t('app', 'Update successful.'));
				return $this->redirect(['view', 'id' => $model->id]);
			}
        }
		return $this->render('update', [
			'model' => $model,
			'listOptions' => $model->optionsList,
		]);
    }

    /**
     * Deletes an existing OptionGroup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
		Yii::$app->session->setFlash('warning', Yii::t('app', 'Delete successful.'));
        return $this->redirect(['index']);
    }

    /**
     * Displays a single OptionGroup model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the OptionGroup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OptionGroup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OptionGroup::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'Record not found.'));
        }
    }

	private function formatRelationList($data) {
		foreach($data as $key => $value) {
			if(trim($value)=='') {
				unset($data[$key]);
			}
		}
		return $data;
	}
}
