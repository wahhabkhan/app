<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductRaw;

/**
 * ProductRawSearch represents the model behind the search form of `common\models\ProductRaw`.
 */
class ProductRawSearch extends ProductRaw
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_raw_id'], 'integer'],
            [['raw_material_name', 'unit', 'weight'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = ProductRaw::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'product_raw_id' => $this->product_raw_id,
        ]);

        $query->andFilterWhere(['like', 'raw_material_name', $this->raw_material_name])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'weight', $this->weight]);

        return $dataProvider;
    }
}
