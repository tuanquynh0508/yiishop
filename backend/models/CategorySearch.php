<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Category;

/**
 * CategorySearch represents the model behind the search form about `common\models\Category`.
 */
class CategorySearch extends Category {

	public $parentName;

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['id', 'parent_id', 'del_flg'], 'integer'],
			[['slug', 'title', 'description', 'created_at', 'updated_at', 'parentName'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function scenarios() {
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}

	/**
	 * Creates data provider instance with search query applied
	 *
	 * @param array $params
	 *
	 * @return ActiveDataProvider
	 */
	public function search($params) {
		$query = Category::find()->select(['c.*', 'p.title AS parentName'])->from('{{%category}} AS c')->visible();

		$query->join('LEFT JOIN', '{{%category}} AS p', 'p.id = c.parent_id');

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		/**
		 * Setup your sorting attributes
		 * Note: This is setup before the $this->load($params)
		 * statement below
		 */
		$dataProvider->setSort([
			'attributes' => [
				'id',
				'title',
				'slug',
				'description',
				'parentName' => [
					'asc' => ['p.title' => SORT_ASC],
					'desc' => ['p.title' => SORT_DESC],
				]
			]
		]);

		$this->load($params);

		if (!$this->validate()) {
			// uncomment the following line if you do not want to any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		$query->andFilterWhere([
			'id' => $this->id,
			'parent_id' => $this->parent_id,
			'created_at' => $this->created_at,
			'updated_at' => $this->updated_at,
			'del_flg' => $this->del_flg,
		]);

		$query->andFilterWhere(['like', 'slug', $this->slug])
				->andFilterWhere(['like', 'title', $this->title])
				->andFilterWhere(['like', 'description', $this->description])
				->andFilterWhere(['like', 'p.title', $this->parentName]);

		return $dataProvider;
	}

}
