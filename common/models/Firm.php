<?php

namespace common\models;

use Yii;
use common\components\CActiveRecord;

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
			[['title', 'logo'], 'string', 'max' => 255]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => Yii::t('backend', 'ID'),
			'title' => Yii::t('backend', 'Title'),
			'logo' => Yii::t('backend', 'Logo'),
			'created_at' => Yii::t('backend', 'Created At'),
			'updated_at' => Yii::t('backend', 'Updated At'),
			'del_flg' => Yii::t('backend', 'Del Flg'),
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getProducts() {
		return $this->hasMany(Product::className(), ['firm_id' => 'id']);
	}

}
