<?php

namespace common\models;

use Yii;
use common\components\CActiveRecord;

/**
 * This is the model class for table "{{%sale}}".
 *
 * @property integer $id
 * @property string $title
 * @property double $sale
 * @property string $start_date
 * @property string $end_date
 * @property string $created_at
 * @property string $updated_at
 * @property integer $del_flg
 *
 * @property ProductSale[] $productSales
 * @property Product[] $products
 */
class Sale extends CActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sale}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'sale', 'start_date', 'end_date'], 'required'],
            [['sale'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['del_flg'], 'integer'],
            [['title'], 'string', 'max' => 255],
			[['start_date', 'end_date'],'date', 'format'=>'yyyy-mm-dd'],
			[['start_date', 'end_date'], 'default', 'value' => date('Y-m-d')],
			['end_date', 'compare', 'compareAttribute' => 'start_date', 'operator' => '>='],
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
            'sale' => Yii::t('app', 'Sale'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'del_flg' => Yii::t('app', 'Del Flg'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductSales()
    {
        return $this->hasMany(ProductSale::className(), ['sale_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])->viaTable('{{%product_sale}}', ['sale_id' => 'id']);
    }
}
