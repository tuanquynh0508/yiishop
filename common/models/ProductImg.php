<?php

namespace common\models;

use Yii;
use common\components\CActiveRecord;

/**
 * This is the model class for table "{{%product_img}}".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $file
 * @property double $width
 * @property double $height
 * @property double $size
 * @property string $ext
 * @property integer $is_default
 * @property string $created_at
 * @property string $updated_at
 * @property integer $del_flg
 *
 * @property Product $product
 */
class ProductImg extends CActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_img}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id', 'is_default', 'del_flg'], 'integer'],
            [['width', 'height', 'size'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['file'], 'string', 'max' => 255],
            [['ext'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'file' => Yii::t('app', 'File'),
            'width' => Yii::t('app', 'Width'),
            'height' => Yii::t('app', 'Height'),
            'size' => Yii::t('app', 'Size'),
            'ext' => Yii::t('app', 'Ext'),
            'is_default' => Yii::t('app', 'Is Default'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'del_flg' => Yii::t('app', 'Del Flg'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
