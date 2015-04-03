<?php
namespace backend\assets;

use yii\web\AssetBundle;

class AdminlteAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    //public $sourcePath = '@app/assets/adminlte/dist';
	//public $forceCopy = false;

    /*public $css = [
        'css/font-awesome.min.css',
    ];*/

	public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'backend\assets\FontAwesomeAsset',
        'backend\assets\IoniconsAsset',
	];

    public function init()
    {
        $postfix = YII_DEBUG ? '' : '.min';

		$this->css = [
            'adminlte/dist/css/AdminLTE'.$postfix.'.css',
            'adminlte/dist/css/skins/_all-skins'.$postfix.'.css',
        ];

        $this->js = [
            'adminlte/dist/js/app'.$postfix.'.js',
            //'adminlte/dist/js/demo.js',
        ];

		parent::init();
        /*parent::init();
        $this->publishOptions['beforeCopy'] = function ($from, $to) {
            $dirname = basename(dirname($from));
            return $dirname === 'fonts' || $dirname === 'css';
        };*/
    }
}
