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
	public $optionsList = [];

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
			[['title'], 'required'],
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

	/**
     * @inheritdoc
     */
	public function save($runValidation = true, $attributeNames = null) {
		$transaction = $this->getDb()->beginTransaction();
		try {
			parent::save($runValidation, $attributeNames);

			//Delete option old
			$this->unlinkOption($this->optionsList);

			if(!empty($this->optionsList)) {
				foreach ($this->optionsList as $optionId => $optionTitle) {
					if($optionId<0) {
						$option = new Option();
						$option->title = $optionTitle;
						$this->link('options', $option);
					} else {
						if (($option = Option::findOne($optionId)) !== null) {
							$option->title = $optionTitle;
							$option->save();
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

	public function unlinkOption($list, $unlinkAll=false, $delete = true) {
		if($unlinkAll) {
			$this->unlinkAll('options', $delete);
		} else {
			foreach ($this->options as $option) {
				if(!array_key_exists($option->id,$list)) {
					$this->unlink('options', $option, $delete);
				}
			}
		}
	}

	public function getOptionsList() {
		foreach ($this->options as $option) {
			$this->optionsList[$option->id] = $option->title;
		}
	}

	/**
     * @inheritdoc
     */
	public function load($data, $formName = null)
    {
		if(isset($data['Options'])) {
			$this->optionsList = $this->removeEmptyData($data['Options']);
		}
		return parent::load($data,$formName);
	}
}
