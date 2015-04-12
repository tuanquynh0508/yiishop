<?php

namespace common\models;

use Yii;
use common\components\CActiveRecord;

/**
 * This is the model class for table "{{%option_group}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $option_type
 * @property string $created_at
 * @property string $updated_at
 * @property integer $del_flg
 *
 * @property Option[] $options
 */
class OptionGroup extends CActiveRecord
{				
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%option_group}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['del_flg'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['option_type'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'option_type' => Yii::t('app', 'Option Type'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'del_flg' => Yii::t('app', 'Del Flg'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptions()
    {
        return $this->hasMany(Option::className(), ['option_group_id' => 'id']);
    }
	
	public function getTypeList() {
		return [
			'text' => 'Kiểu Text',
			'color' => 'Kiểu Màu sắc',			
		];
	}
}
