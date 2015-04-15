<?php

namespace common\models;

use Yii;
use common\components\CActiveRecord;

/**
 * This is the model class for table "{{%product_option}}".
 *
 * @property integer $product_id
 * @property integer $option_id
 * @property string $option_value
 * @property string $created_at
 * @property string $updated_at
 * @property integer $del_flg
 *
 * @property Option $option
 * @property Product $product
 */
class ProductOption extends CActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_option}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'option_id'], 'required'],
            [['product_id', 'option_id', 'del_flg'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['option_value'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'option_id' => Yii::t('app', 'Option ID'),
            'option_value' => Yii::t('app', 'Option Value'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'del_flg' => Yii::t('app', 'Del Flg'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOption()
    {
        return $this->hasOne(Option::className(), ['id' => 'option_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
