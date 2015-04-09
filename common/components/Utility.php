<?php

namespace common\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\web\HttpException;
use common\libraries\verot\Upload;

class Utility extends Component {

	public function welcome() {
		return "Utility component by TuanQuynh.";
	}

	public function thumbnails($file, $path, $type = 'small', $clear = false) {
		$handle = new Upload($file, 'vn_VN');
		if ($handle->uploaded) {
			//Check Mime
			$handle->no_script = false;
			$handle->mime_check = true;
			$handle->file_max_size = Yii::$app->params['upload_var']['max_size'];
			$handle->allowed = array('image/*');
			//$handle->file_auto_rename = true;
			$handle->image_resize = true;
			$handle->image_ratio = true;
			$handle->image_x = Yii::$app->params['upload_var'][$type]['width'];
			$handle->image_y = Yii::$app->params['upload_var'][$type]['height'];
			//$handle->image_rotate = '90';
			$handle->file_name_body_pre = Yii::$app->params['upload_var'][$type]['prefix'];
			//$handle->file_new_name_body = 'img_'.date('YmdHis');

			$handle->process($path);
			if ($handle->processed) {
				if($clear) {
					$handle->clean();
				}
				return true;
			} else {
				throw new HttpException(501, $handle->error);
			}
		} else {
			throw new HttpException(501, $handle->error);
		}
	}

	public function deleteImgWithThumbnails($file, $path) {
		if (empty($file))
			return false;
		if (file_exists($path . $file)) {
			unlink($path . $file);
		}
		if (file_exists($path . Yii::$app->params['upload_var']['small']['prefix'] . $file)) {
			unlink($path . Yii::$app->params['upload_var']['small']['prefix'] . $file);
		}
		if (file_exists($path . Yii::$app->params['upload_var']['medium']['prefix'] . $file)) {
			unlink($path . Yii::$app->params['upload_var']['medium']['prefix'] . $file);
		}
	}

}
