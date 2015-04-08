<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Firm;

/**
 * FirmSearch represents the model behind the search form about `common\models\Firm`.
 */
class FirmSearch extends Firm {

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['id', 'del_flg'], 'integer'],
			[['title', 'logo', 'created_at', 'updated_at'], 'safe'],
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
		$query = Firm::find()->visible();

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		$this->load($params);

		if (!$this->validate()) {
			// uncomment the following line if you do not want to any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		$query->andFilterWhere([
			'id' => $this->id,
			'created_at' => $this->created_at,
			'updated_at' => $this->updated_at,
			'del_flg' => $this->del_flg,
		]);

		$query->andFilterWhere(['like', 'title', $this->title])
				->andFilterWhere(['like', 'logo', $this->logo]);

		return $dataProvider;
	}

}
