<?php
namespace frontend\assets;

use yii\web\AssetBundle;

class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@app/assets/font-awesome';
	//public $forceCopy = false;

    /*public $css = [
        'css/font-awesome.min.css',
    ];*/

	public $depends = [
		'yii\bootstrap\BootstrapAsset',
	];

    public function init()
    {
		$postfix = YII_DEBUG ? '' : '.min';
		$this->css[] = 'css/font-awesome' . $postfix . '.css';
		parent::init();
        /*parent::init();
        $this->publishOptions['beforeCopy'] = function ($from, $to) {
            $dirname = basename(dirname($from));
            return $dirname === 'fonts' || $dirname === 'css';
        };*/
    }
}
