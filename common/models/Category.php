<?php

namespace common\models;

use Yii;
use common\components\CActiveRecord;

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
class Category extends CActiveRecord {

	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return '{{%category}}';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
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
	public function attributeLabels() {
		return [
			'id' => Yii::t('backend', 'ID'),
			'parent_id' => Yii::t('backend', 'Parent ID'),
			'slug' => Yii::t('backend', 'Slug'),
			'title' => Yii::t('backend', 'Title'),
			'description' => Yii::t('backend', 'Description'),
			'created_at' => Yii::t('backend', 'Created At'),
			'updated_at' => Yii::t('backend', 'Updated At'),
			'del_flg' => Yii::t('backend', 'Del Flg'),
			'parentName' => 'Danh mục cha',
		];
	}

	/**
	 * @return common\components\MyActiveQuery
	 */
	public function getCategoryProducts() {
		return $this->hasMany(CategoryProduct::className(), ['category_id' => 'id']);
	}

	/**
	 * @return common\components\MyActiveQuery
	 */
	public function getProducts() {
		return $this->hasMany(Product::className(), ['id' => 'product_id'])->viaTable('{{%category_product}}', ['category_id' => 'id']);
	}

	public function getParent() {
		return $this->hasOne(Category::className(), ['id' => 'parent_id']);
	}

	public function getParentName() {
		$model = $this->parent;
		return $model ? $model->title : '';
	}

	public function getTreeCategory($parentId = 0, $level = 1, $suffix = "", $recursive = false, $skipId = 0) {
		$list = array();
		$categories = Category::find()
				->where('IFNULL(parent_id,0) = :parentId AND id != :skipId', [
					':parentId' => $parentId,
					':skipId' => $skipId,
				])
				->orderBy('title')
				->all();
		foreach ($categories as $category) {
			$item = new \stdClass();
			$item->id = $category->id;
			$item->title = str_pad($category->title, 3 * $level + strlen($category->title), $suffix, STR_PAD_LEFT);
			$item->parent_id = $category->parent_id;
			$item->slug = $category->slug;
			$item->level = $level;
			if ($recursive) {
				$item->childrent = $this->getTreeCategory($category->id, $level + 1);
				$list[] = $item;
			} else {
				$list[] = $item;
				$list = array_merge($list, $this->getTreeCategory($category->id, $level + 1, $suffix, $recursive, $skipId));
			}
		}
		return $list;
	}

}
