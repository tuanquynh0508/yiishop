<?php

namespace backend\modules\product\controllers;

use Yii;
use backend\components\CController;
use common\models\Product;
use backend\models\ProductSearch;
use yii\web\NotFoundHttpException;
use common\models\OptionGroup;

/**
 * DefaultController implements the CRUD actions for Product model.
 */
class DefaultController extends CController
{

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			Yii::$app->session->setFlash('success', Yii::t('app', 'Create successful.'));
			return $this->redirect(['view', 'id' => $model->id]);
        }
		return $this->render('create', [
			'model' => $model,
			'listOptionGroups' => $this->findAllOptionGroups(),
		]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$model->getInputOption();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			Yii::$app->session->setFlash('success', Yii::t('app', 'Update successful.'));
			return $this->redirect(['view', 'id' => $model->id]);
        }
		return $this->render('update', [
			'model' => $model,
			'listOptionGroups' => $this->findAllOptionGroups(),
		]);
    }

    /**
     * Deletes an existing Product model.
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
     * Displays a single Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'Record not found.'));
        }
    }
	
	protected function findAllOptionGroups()
	{
		return OptionGroup::findAll(['del_flg' => '0']);
	}
}
