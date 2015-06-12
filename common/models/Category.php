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
			[['slug'], 'unique'],
			['parent_id', 'checkParentValidation'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => Yii::t('app', 'ID'),
			'parent_id' => Yii::t('app', 'Parent ID'),
			'slug' => Yii::t('app', 'Slug'),
			'title' => Yii::t('app', 'Title'),
			'description' => Yii::t('app', 'Description'),
			'created_at' => Yii::t('app', 'Created At'),
			'updated_at' => Yii::t('app', 'Updated At'),
			'del_flg' => Yii::t('app', 'Del Flg'),
			'parentName' => 'Danh mục cha',
		];
	}

	public function checkParentValidation($attribute, $params){
		// add custom validation
		if(!empty($this->$attribute) && $this->$attribute==$this->id)
			$this->addError($attribute,Yii::t('backend', 'Danh mục cha không hợp lệ'));
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
				->where('IFNULL(parent_id,0) = :parentId AND id != :skipId AND del_flg = :delFlag', [
					':parentId' => $parentId,
					':skipId' => $skipId,
					':delFlag' => 0,
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

	public static function staticGetTreeCategory($parentId = 0, $level = 1, $suffix = "", $recursive = false, $skipId = 0) {
		$list = array();
		$categories = Category::find()
				->where('IFNULL(parent_id,0) = :parentId AND id != :skipId AND del_flg = :delFlag', [
					':parentId' => $parentId,
					':skipId' => $skipId,
					':delFlag' => 0,
				])
				->orderBy('title')
				->all();
		foreach ($categories as $category) {
			$item = new \stdClass();
			$item->id = $category->id;
			if(!empty($suffix)) {
				$item->title = str_pad($category->title, 3 * $level + strlen($category->title), $suffix, STR_PAD_LEFT);
			} else {
				$item->title = $category->title;
			}
			$item->parent_id = $category->parent_id;
			$item->slug = $category->slug;
			$item->level = $level;
			if ($recursive) {
				$item->childrent = Category::staticGetTreeCategory($category->id, $level + 1, $suffix, $recursive, $skipId);
				$list[] = $item;
			} else {
				$list[] = $item;
				$list = array_merge($list, Category::staticGetTreeCategory($category->id, $level + 1, $suffix, $recursive, $skipId));
			}
		}
		return $list;
	}

	public static function getListChildId($parentId = 0) {
		$list = array();
		$categories = Category::find()
				->where('IFNULL(parent_id,0) = :parentId AND del_flg = :delFlag', [
					':parentId' => $parentId,
					':delFlag' => 0,
				])
				->all();
		foreach ($categories as $category) {
			$list[] = $category->id;
			$childs = Category::getListChildId($category->id);
			$list = array_merge($list, $childs);
		}
		return $list;
	}

}
