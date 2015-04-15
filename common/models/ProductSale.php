<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%product_sale}}".
 *
 * @property integer $sale_id
 * @property integer $product_id
 *
 * @property Product $product
 * @property Sale $sale
 */
class ProductSale extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_sale}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sale_id', 'product_id'], 'required'],
            [['sale_id', 'product_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sale_id' => Yii::t('app', 'Sale ID'),
            'product_id' => Yii::t('app', 'Product ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSale()
    {
        return $this->hasOne(Sale::className(), ['id' => 'sale_id']);
    }
}
