<?php

namespace common\components;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class CActiveRecord extends \yii\db\ActiveRecord {

	//Auto save time
	//http://www.yiiframework.com/wiki/684/save-and-display-date-time-fields-in-different-formats-in-yii2/
	public function CBehaviors() {
		return [];
	}
	
	/**
     * @inheritdoc
     */
	public function behaviors() {
		$defaultBehaviors = [
			'timestamp' => [
				'class' => TimestampBehavior::className(),
				'attributes' => [
					ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
					ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
				],
				'value' => function() {
			return date('Y-m-d H:i:s');
		}, //unix timestamp
			],
		];

		if (!empty($this->CBehaviors())) {
			$defaultBehaviors = array_merge_recursive($this->CBehaviors(), $defaultBehaviors);
		}

		return $defaultBehaviors;
	}
	
	/**
     * @inheritdoc
     */
	public static function find() {
		return new CActiveQuery(get_called_class());
	}

	/* public static function find()
	  {
	  return parent::find()->where(['del_flg' => 0]);
	  } */
	
	/**
     * @inheritdoc
     */
	public function delete() {
		$this->del_flg = 1;
		return $this->save();
	}
	
	public function removeEmptyData($data) {
		foreach($data as $key => $value) {
			if(trim($value)=='') {
				unset($data[$key]);
			}
		}
		return $data;
	}

}
