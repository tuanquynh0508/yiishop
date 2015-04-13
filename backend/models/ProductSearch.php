<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Product;

/**
 * ProductSearch represents the model behind the search form about `common\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'firm_id', 'quantity', 'out_of_stock', 'is_new', 'is_special', 'views', 'del_flg'], 'integer'],
            [['upc', 'slug', 'title', 'description', 'made', 'created_at', 'updated_at'], 'safe'],
            [['wholesale_prices', 'retail_price', 'cost'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
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
    public function search($params)
    {
        $query = Product::find()->visible();

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
            'firm_id' => $this->firm_id,
            'wholesale_prices' => $this->wholesale_prices,
            'retail_price' => $this->retail_price,
            'cost' => $this->cost,
            'quantity' => $this->quantity,
            'out_of_stock' => $this->out_of_stock,
            'is_new' => $this->is_new,
            'is_special' => $this->is_special,
            'views' => $this->views,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'del_flg' => $this->del_flg,
        ]);

        $query->andFilterWhere(['like', 'upc', $this->upc])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'made', $this->made]);

        return $dataProvider;
    }
}
