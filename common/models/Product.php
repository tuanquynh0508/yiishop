<?php

namespace common\models;

use Yii;
use common\components\CActiveRecord;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property integer $id
 * @property integer $firm_id
 * @property string $upc
 * @property string $slug
 * @property string $title
 * @property string $description
 * @property double $wholesale_prices
 * @property double $retail_price
 * @property double $cost
 * @property string $made
 * @property integer $quantity
 * @property integer $out_of_stock
 * @property integer $is_new
 * @property integer $is_special
 * @property integer $views
 * @property string $created_at
 * @property string $updated_at
 * @property integer $del_flg
 *
 * @property CategoryProduct[] $categoryProducts
 * @property Category[] $categories
 * @property Firm $firm
 * @property ProductImg[] $productImgs
 * @property ProductOption[] $productOptions
 * @property Option[] $options
 * @property ProductOrder[] $productOrders
 * @property Order[] $orders
 * @property ProductReview[] $productReviews
 * @property ProductSale[] $productSales
 * @property Sale[] $sales
 */
class Product extends CActiveRecord
{
	public $inputCategories = [];
	public $inputImgs = [];
	public $inputSales = [];
	public $inputOption = [];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firm_id', 'upc', 'slug', 'title'], 'required'],
			[['upc', 'slug'], 'unique'],
            [['firm_id', 'quantity', 'out_of_stock', 'is_new', 'is_special', 'views', 'del_flg'], 'integer'],
            [['description'], 'string'],
            [['wholesale_prices', 'retail_price', 'cost'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['upc', 'slug', 'title'], 'string', 'max' => 255],
            [['made'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'firm_id' => Yii::t('app', 'Firm ID'),
            'upc' => Yii::t('app', 'Upc'),
            'slug' => Yii::t('app', 'Slug'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'wholesale_prices' => Yii::t('app', 'Wholesale Prices'),
            'retail_price' => Yii::t('app', 'Retail Price'),
            'cost' => Yii::t('app', 'Cost'),
            'made' => Yii::t('app', 'Made'),
            'quantity' => Yii::t('app', 'Quantity'),
            'out_of_stock' => Yii::t('app', 'Out Of Stock'),
            'is_new' => Yii::t('app', 'Is New'),
            'is_special' => Yii::t('app', 'Is Special'),
            'views' => Yii::t('app', 'Views'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'del_flg' => Yii::t('app', 'Del Flg'),
        ];
    }

	/**
     * @inheritdoc
     */
//	public function init()
//    {
//		parent::init();
//		$this->upc = 'sp-';
//		$this->wholesale_prices = 0;
//		$this->retail_price = 0;
//		$this->cost = 0;
//		$this->quantity = 0;
//		$this->views = 0;
//		$this->made = 'vn';
//	}

	public function addNewInit()
    {
		parent::init();
		$this->upc = 'sp-';
		$this->wholesale_prices = 0;
		$this->retail_price = 0;
		$this->cost = 0;
		$this->quantity = 0;
		$this->views = 0;
		$this->made = 'vn';
	}

	/**
     * @inheritdoc
     */
	public function load($data, $formName = null)
    {
		if(isset($data['Product']['categories'])) {
			$this->inputCategories = $this->removeEmptyData($data['Product']['categories']);
		}
		if(isset($data['Product']['sales'])) {
			$this->inputSales = $data['Product']['sales'];
		}
		if(isset($data['Product']['options'])) {
			$this->inputOption = [];
			foreach($data['Product']['options'] as $optionKey) {
				$this->inputOption[$optionKey] = $data['Product']['options-value'][$optionKey];
			}
		}
		if(isset($data['Product']['thumbnails'])) {
			$this->inputImgs = [];
			$selectedDefault = isset($data['Product']['thumbnails-default'])?$data['Product']['thumbnails-default']:0;
			foreach($data['Product']['thumbnails'] as $key => $img) {
				$itemPhoto = new \stdClass();
				$itemPhoto->default = false;
				if( $selectedDefault == $key) {
					$itemPhoto->default = true;
				}
				$itemPhoto->file = $img;
				$this->inputImgs[$key] = $itemPhoto;
			}
		}

		return parent::load($data,$formName);
	}

	public function getInputOption() {
		foreach ($this->productOptions as $option) {
			$this->inputOption[$option->option_id] = $option->option_value;
		}
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryProducts()
    {
        return $this->hasMany(CategoryProduct::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])->viaTable('{{%category_product}}', ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFirm()
    {
        return $this->hasOne(Firm::className(), ['id' => 'firm_id'])->visible();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImgs()
    {
        return $this->hasMany(ProductImg::className(), ['product_id' => 'id'])->visible();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductOptions()
    {
        return $this->hasMany(ProductOption::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptions()
    {
        return $this->hasMany(Option::className(), ['id' => 'option_id'])->viaTable('{{%product_option}}', ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductOrders()
    {
        return $this->hasMany(ProductOrder::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['id' => 'order_id'])->viaTable('{{%product_order}}', ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductReviews()
    {
        return $this->hasMany(ProductReview::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductSales()
    {
        return $this->hasMany(ProductSale::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sale::className(), ['id' => 'sale_id'])->viaTable('{{%product_sale}}', ['product_id' => 'id'])
        ->andWhere('{{%sale}}.start_date < NOW()')
        ->andWhere('{{%sale}}.end_date > NOW()');
    }

	public function save($runValidation = true, $attributeNames = null) {
		$transaction = $this->getDb()->beginTransaction();
		try {
			$valid = parent::save($runValidation, $attributeNames);
			if($valid === false) {
				return $valid;
			}

			//Remove old category link
			$this->unlinkAll('categoryProducts', true);
			//Remove old sales link
			$this->unlinkAll('productSales', true);
			//Remove old options link
			$this->unlinkAll('productOptions', true);
			//Remove old images
			$this->unlinkImgs($this->inputImgs);

			//Add Categories
			if(!empty($this->inputCategories)) {
				foreach ($this->inputCategories as $categoryId) {
					$categoryProduct = new CategoryProduct();
					$categoryProduct->category_id = $categoryId;
					$this->link('categoryProducts', $categoryProduct);
				}
			}

			//Add Sales
			if(!empty($this->inputSales)) {
				$productSale = new ProductSale();
				$productSale->sale_id = $this->inputSales;
				$this->link('productSales', $productSale);
			}

			//Add Options
			if(!empty($this->inputOption)) {
				foreach ($this->inputOption as $optionId => $optionValue) {
					$productOption = new ProductOption();
					$productOption->option_id = $optionId;
					$productOption->option_value = $optionValue;
					$this->link('productOptions', $productOption);
				}
			}

			//Add Images
			if(!empty($this->inputImgs)) {
				foreach ($this->inputImgs as $imgId => $img) {
					if(intval($imgId) < 0) {
						$fullImgPath = Yii::getAlias(Yii::$app->params['upload_path']['product']).$img->file;
						$path_parts = pathinfo($fullImgPath);
						list($width, $height) = getimagesize($fullImgPath);
						$imageItem = new ProductImg();
						$imageItem->file = $img->file;
						$imageItem->is_default = ($img->default)?1:0;
						$imageItem->product_id = $this->id;
						$imageItem->width = (float) $width;
						$imageItem->height = (float) $height;
						$imageItem->size = (float) filesize($fullImgPath);
						$imageItem->ext = $path_parts['extension'];

						$imageItem->save();
					} else {
						if (($imageItem = ProductImg::findOne($imgId)) !== null) {
							$imageItem->is_default = ($img->default)?1:0;
							$imageItem->save();
						}
					}
				}
			}

			$transaction->commit();

			return $this;
		} catch (Exception $e) {
			$transaction->rollBack();
			return null;
		}
	}

	public function unlinkImgs($list) {
		foreach ($this->productImgs as $img) {
			if(!array_key_exists($img->id,$list)) {
				$img->delete();
			}
		}
	}

	public function getImgList() {
		foreach ($this->productImgs as $img) {
			$itemPhoto = new \stdClass();
			$itemPhoto->default = false;
			if($img->is_default == 1) {
				$itemPhoto->default = true;
			}
			$itemPhoto->file = $img->file;
			$this->inputImgs[$img->id] = $itemPhoto;
		}
	}

	public function getDefaultImg($size = 's') {
		$sizeList = array(
			's' => Yii::$app->params['upload_var']['small']['prefix']."/",
			'm' => Yii::$app->params['upload_var']['medium']['prefix']."/",
			'n' => Yii::$app->params['upload_var']['normal']['prefix'],
		);
		$sizeImg = $sizeList['s'];
		$file = '';

		if(array_key_exists($size, $sizeList)) {
			$sizeImg = $sizeList[$size];
		}

		foreach ($this->productImgs as $img) {
			if($img->is_default == 1) {
				$file = $img->file;
			}
		}

		if($file !== '') {
			return Yii::getAlias('@img_path/product/'.$sizeImg).$file;
		} else {
			return Yii::getAlias('@img_path/'.(str_replace("/", "", $sizeImg)).'nopicture.jpg');
		}
	}

	public function getListOptionsGroup() {
		$listOptions = new \stdClass();
		$listOptions->group = array();
		$listOptions->options = array();
		$listOptions->values = array();
		foreach ($this->options as $option) {
			if(!array_key_exists($option->optionGroup->id, $listOptions->group)) {
				$listOptions->group[$option->optionGroup->id] = $option->optionGroup;
				$listOptions->options[$option->optionGroup->id] = array();
			}
			$listOptions->options[$option->optionGroup->id][] = $option;
			foreach ($this->productOptions as $optionValue) {
				if($option->id == $optionValue->option_id) {
					$listOptions->values[$option->optionGroup->id.'-'.$option->id] = $optionValue->option_value;
				}
			}
		}
		return $listOptions;
	}

	public function getFullMade() {
		$made = array(
			'vn' => 'Việt Nam',
			'cn' => 'Trung Quốc',
		);
		return $made[$this->made];
	}

	public function getSalePrice() {
		if(empty($this->sales)) {
			return 0;
		}

		$sale = $this->sales[0]->sale;

		return $this->retail_price - ($this->retail_price*$sale)/100;
	}

	public static function getProductByCategory($categoryId, $limit = 8) {
		$categoriesId = [$categoryId];
		$categoriesId = array_merge($categoriesId, Category::getListChildId($categoryId));
		return Product::find()
				//->joinWith('categoryProducts', false, 'LEFT JOIN')
				->joinWith('categories', false, 'LEFT JOIN')
				->where(['{{%category}}.id' => $categoriesId])
				//->andWhere('is_special = :is_special', [':is_special' => 0])
				->orderBy(['created_at' => SORT_DESC])
				->visible(0, self::tableName())
				->limit($limit)
				->all();
	}

}
