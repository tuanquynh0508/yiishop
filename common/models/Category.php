<?php

namespace common\models;

use Yii;

use common\components\MyActiveRecord;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $slug
 * @property string $title
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property integer $del_flg
 *
 * @property CategoryProduct[] $categoryProducts
 * @property Product[] $products
 */
class Category extends MyActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'del_flg'], 'integer'],
            [['slug', 'title'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['slug', 'title'], 'string', 'max' => 255],
            [['slug'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'parent_id' => Yii::t('backend', 'Parent ID'),
            'slug' => Yii::t('backend', 'Slug'),
            'title' => Yii::t('backend', 'Title'),
            'description' => Yii::t('backend', 'Description'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'del_flg' => Yii::t('backend', 'Del Flg'),
        ];
    }

    /**
     * @return common\components\MyActiveQuery
     */
    public function getCategoryProducts()
    {
        return $this->hasMany(CategoryProduct::className(), ['category_id' => 'id']);
    }

    /**
     * @return common\components\MyActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])->viaTable('{{%category_product}}', ['category_id' => 'id']);
    }
}
