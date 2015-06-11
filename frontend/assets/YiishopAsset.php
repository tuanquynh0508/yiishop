<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class YiishopAsset extends AssetBundle {

		public $basePath = '@webroot';
		public $baseUrl = '@web';
		//public $sourcePath = '@app/assets/adminlte/dist';
		//public $forceCopy = false;

		/* public $css = [
		  'css/font-awesome.min.css',
		  ]; */

		public $depends = [
				'yii\web\YiiAsset',
				'yii\web\JqueryAsset',
		];

		public function init() {
				$this->css = [
						'yiishop/css/reset.css',
						'yiishop/css/text.css',
						'yiishop/css/grid.css',
						'yiishop/css/style.css',
						'yiishop/js/qtip/jquery.qtip.min.css'
				];

				$this->js = [
						'yiishop/js/jquery.scrollUp.min.js',
						'yiishop/js/qtip/jquery.qtip.min.js',
				];

				parent::init();
		}

}
