<?php

namespace common\models;

use Yii;
use common\components\CActiveRecord;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%firm}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $logo
 * @property string $created_at
 * @property string $updated_at
 * @property integer $del_flg
 *
 * @property Product[] $products
 */
class Firm extends CActiveRecord {

	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return '{{%firm}}';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['title'], 'required'],
			[['created_at', 'updated_at'], 'safe'],
			[['del_flg'], 'integer'],
			[['logo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'gif, jpg, jpeg, png, bmp', 'maxSize' => 1024*1024],
			[['title', 'logo'], 'string', 'max' => 255]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => Yii::t('app', 'ID'),
			'title' => Yii::t('app', 'Title'),
			'logo' => Yii::t('app', 'Logo'),
			'created_at' => Yii::t('app', 'Created At'),
			'updated_at' => Yii::t('app', 'Updated At'),
			'del_flg' => Yii::t('app', 'Del Flg'),
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getProducts() {
		return $this->hasMany(Product::className(), ['firm_id' => 'id']);
	}

}
