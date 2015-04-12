<?php

namespace common\models;

use Yii;
use common\components\CActiveRecord;

/**
 * This is the model class for table "{{%option}}".
 *
 * @property integer $id
 * @property integer $option_group_id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 * @property integer $del_flg
 *
 * @property OptionGroup $optionGroup
 * @property ProductOption[] $productOptions
 * @property Product[] $products
 */
class Option extends CActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%option}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['option_group_id'], 'required'],
            [['option_group_id', 'del_flg'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'option_group_id' => Yii::t('app', 'Option Group ID'),
            'title' => Yii::t('app', 'Title'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'del_flg' => Yii::t('app', 'Del Flg'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptionGroup()
    {
        return $this->hasOne(OptionGroup::className(), ['id' => 'option_group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductOptions()
    {
        return $this->hasMany(ProductOption::className(), ['option_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])->viaTable('{{%product_option}}', ['option_id' => 'id']);
    }
}
