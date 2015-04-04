<?php
namespace backend\components;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class CController extends Controller
{
	public $layout = '//adminlte';
	
    public function CBehaviors(){
		return [];
	}
	
	public function CActions(){
		return [];
	}
    
	/**
     * @inheritdoc
     */
    public function behaviors()
    {
        $defaultAccessRules = [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        //'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
					'delete' => ['post'],
                ],
            ],
        ];
        
        if(!empty($this->CBehaviors())) {
            $defaultAccessRules = array_merge_recursive($this->CBehaviors(),$defaultAccessRules) ;
        }
        
        return $defaultAccessRules;
    }
	
	/**
     * @inheritdoc
     */
    public function actions()
    {
        $defaultActions = [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
		
		if(!empty($this->CActions())) {
            $defaultActions = array_merge_recursive($this->CActions(),$defaultActions) ;
        }
        
        return $defaultActions;
    }
}

