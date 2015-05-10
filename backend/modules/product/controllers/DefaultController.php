<?php

namespace backend\modules\product\controllers;

use Yii;
use backend\components\CController;
use common\models\Product;
use backend\models\ProductSearch;
use yii\web\NotFoundHttpException;
use common\models\OptionGroup;

use common\libraries\verot\Upload;

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
		$model->addNewInit();

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
		$model->getImgList();

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
		$model = $this->findModel($id);
		$model->getImgList();
		
        return $this->render('view', [
            'model' => $model,
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

	public function actionUpload()
    {
		\Yii::$app->response->format = 'json';

		$jsonObject = array();
		$path = Yii::getAlias(Yii::$app->params['upload_path']['product']);
		$filename = '';

		$handle = new Upload($_FILES['file'], 'vn_VN');
		if ($handle->uploaded) {
			//Check Mime
			$handle->no_script = false;
			$handle->mime_check = true;
			$handle->file_max_size = Yii::$app->params['upload_var']['max_size'];
			$handle->allowed = array('image/*');
			//$handle->file_auto_rename = true;
			$handle->image_resize = true;
			$handle->image_ratio = true;
			$handle->image_x = Yii::$app->params['upload_var']['normal']['width'];
			$handle->image_y = Yii::$app->params['upload_var']['normal']['height'];
			//$handle->image_rotate = '90';
			$handle->file_name_body_pre = Yii::$app->params['upload_var']['normal']['prefix'];
			$handle->file_new_name_body = Yii::$app->utility->slugify($handle->file_src_name_body);
			$handle->process($path);
			if ($handle->processed) {
				//$handle->clean();
				//$jsonObject['status'] = 'success';
				//$jsonObject['file'] = $handle->file_dst_name_body;
				$filename = $handle->file_dst_name_body;
			} else {
				$jsonObject['status'] = 'error';
				$jsonObject['message'] = $handle->error;
			}
			////////////////////////////////////////////////////////////////////
			$handle->image_resize = true;
			$handle->image_ratio = true;
			$handle->image_x = Yii::$app->params['upload_var']['small']['width'];
			$handle->image_y = Yii::$app->params['upload_var']['small']['height'];
			//$handle->image_rotate = '90';
			//$handle->file_name_body_pre = Yii::$app->params['upload_var']['small']['prefix'];
			$handle->file_new_name_body = $filename;
			$handle->process($path.'/'.Yii::$app->params['upload_var']['small']['prefix'].'/');
			if ($handle->processed) {
				//$handle->clean();
				//$jsonObject['status'] = 'success';
				//$jsonObject['file'] = $handle->file_dst_name;
			} else {
				$jsonObject['status'] = 'error';
				$jsonObject['message'] = $handle->error;
			}
			////////////////////////////////////////////////////////////////////
			$handle->image_resize = true;
			$handle->image_ratio = true;
			$handle->image_x = Yii::$app->params['upload_var']['medium']['width'];
			$handle->image_y = Yii::$app->params['upload_var']['medium']['height'];
			//$handle->image_rotate = '90';
			//$handle->file_name_body_pre = Yii::$app->params['upload_var']['medium']['prefix'];
			$handle->file_new_name_body = $filename;
			$handle->process($path.'/'.Yii::$app->params['upload_var']['medium']['prefix'].'/');
			if ($handle->processed) {
				$handle->clean();
				$jsonObject['status'] = 'success';
				$jsonObject['file'] = $handle->file_dst_name;
			} else {
				$jsonObject['status'] = 'error';
				$jsonObject['message'] = $handle->error;
			}
		} else {
			$jsonObject['status'] = 'error';
			$jsonObject['message'] = $handle->error;
		}

		return $jsonObject;
		//return \yii\helpers\Json::encode($jsonObject);
    }
}
