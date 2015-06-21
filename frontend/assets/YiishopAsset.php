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
						'yiishop/js/qtip/jquery.qtip.min.css',
						'yiishop/js/fancybox/jquery.fancybox.css',
						'yiishop/js/classyscroll/jquery.classyscroll.css',
						'yiishop/js/toast/simply-toast.min.css', //http://codepen.io/ericprieto/full/OPKjed/
						'yiishop/css/style.css',
				];

				$this->js = [
						'js/utility.js',
						'yiishop/js/jquery.mousewheel.min.js',
						'yiishop/js/jquery.scrollUp.min.js',
						'yiishop/js/qtip/jquery.qtip.min.js',
						'yiishop/js/fancybox/jquery.fancybox.pack.js',
						'yiishop/js/classyscroll/jquery.classyscroll.js',
						'yiishop/js/toast/simply-toast.min.js',
				];

				parent::init();
		}

}
