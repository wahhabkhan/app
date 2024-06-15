<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\OrderItems;

/**
 * OrderItemsSearch represents the model behind the search form of `common\models\OrderItems`.
 */
class OrderItemsSearch extends OrderItems
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_items_id', 'quantity', 'order_id'], 'integer'],
            [['product'], 'safe'],
            [['var_rate', 'unit_price', 'sub_total'], 'number'],
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
        $query = OrderItems::find();

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
            'order_items_id' => $this->order_items_id,
            'var_rate' => $this->var_rate,
            'quantity' => $this->quantity,
            'unit_price' => $this->unit_price,
            'sub_total' => $this->sub_total,
            'order_id' => $this->order_id,
        ]);

        $query->andFilterWhere(['like', 'product', $this->product]);

        return $dataProvider;
    }
}
