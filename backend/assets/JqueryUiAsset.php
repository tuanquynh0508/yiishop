<?php
namespace backend\assets;

use yii\web\AssetBundle;

class JqueryUiAsset extends AssetBundle
{
    public $sourcePath = '@app/assets/jqueryui';
	//public $forceCopy = false;

    /*public $css = [
        'css/font-awesome.min.css',
    ];*/

	public $depends = [
		'yii\web\JqueryAsset',
	];

    public function init()
    {
		$postfix = YII_DEBUG ? '' : '.min';
		
		$this->css = [
			'jquery-ui' . $postfix . '.css',
			'jquery-ui.structure' . $postfix . '.css',
			'jquery-ui.theme' . $postfix . '.css',
		];
		
		$this->js[] = 'jquery-ui' . $postfix . '.js';
		
		parent::init();
        /*parent::init();
        $this->publishOptions['beforeCopy'] = function ($from, $to) {
            $dirname = basename(dirname($from));
            return $dirname === 'fonts' || $dirname === 'css';
        };*/
    }
}
