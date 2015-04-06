<?php

namespace backend\modules\user\controllers;

use Yii;
//use yii\filters\AccessControl;
//use yii\web\Controller;
use backend\models\LoginForm;
use yii\filters\VerbFilter;
use backend\components\CController;

class DefaultController extends CController {

	public function actionIndex() {
		return $this->render('index');
	}

	public function actionLogin() {
		$this->layout = '//adminlte_login';

		if (!\Yii::$app->user->isGuest) {
			return $this->goHome();
		}

		$model = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return $this->goBack();
		} else {
			return $this->render('login', [
						'model' => $model,
			]);
		}
	}

	public function actionLogout() {
		Yii::$app->user->logout();

		return $this->goHome();
	}

}
