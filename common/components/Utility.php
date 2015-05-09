<?php

namespace common\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\web\HttpException;
use yii\helpers\Url;

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
	
	public function slugify($str) {
		$tmp = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		$tmp = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $tmp);
		$tmp = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $tmp);
		$tmp = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $tmp);
		$tmp = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $tmp);
		$tmp = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $tmp);
		$tmp = preg_replace("/(đ)/", 'd', $tmp);
		$tmp = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $tmp);
		$tmp = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $tmp);
		$tmp = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $tmp);
		$tmp = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $tmp);
		$tmp = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $tmp);
		$tmp = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $tmp);
		$tmp = preg_replace("/(Đ)/", 'D', $tmp);				
		$tmp = strtolower(trim($tmp));		
		//$tmp = str_replace('-','',$tmp);
		$tmp = str_replace(' ','-',$tmp);
		$tmp = str_replace('_','-',$tmp);
		$tmp = str_replace('.','',$tmp);
		$tmp = str_replace("'",'',$tmp);
		$tmp = str_replace('"','',$tmp);		
		$tmp = str_replace('"','',$tmp);
		$tmp = str_replace('"','',$tmp);
		$tmp = str_replace("'",'',$tmp);
		$tmp = str_replace('̀','',$tmp);		
		$tmp = str_replace('&','',$tmp);
		$tmp = str_replace('@','',$tmp);
		$tmp = str_replace('^','',$tmp);
		$tmp = str_replace('=','',$tmp);
		$tmp = str_replace('+','',$tmp);
		$tmp = str_replace(':','',$tmp);
		$tmp = str_replace(',','',$tmp);
		$tmp = str_replace('{','',$tmp);
		$tmp = str_replace('}','',$tmp);
		$tmp = str_replace('?','',$tmp);
		$tmp = str_replace('\\','',$tmp);
		$tmp = str_replace('/','',$tmp);
		$tmp = str_replace('quot;','',$tmp);
		return $tmp;
	}
	
	public function formatCurrency($number) {
		$tmp = number_format($number, 0, '.', ',');
		if(Yii::app()->params['currency']['position']=='prefix') {
			return Yii::app()->params['currency']['symbol'].$tmp;
		} else {
			return $tmp.Yii::app()->params['currency']['symbol'];
		}
	}
	
	public function getActiveMenu($listUrls = array()) {
		$check = false;
		$currentUrl = Url::current();
		
		if(empty($listUrls)) {
			return $check;
		}
				
		foreach ($listUrls as $route) {
			$url = Url::to($route);
			if($url === $currentUrl) {
				$check = true;
				break;
			}
		}
		
		return $check;
	}

}
