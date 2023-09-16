<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Order;

/**
 * OrderSearch represents the model behind the search form of `common\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'date', 'invoice_number', 'company_name', 'street_name', 'house_number', 'appendix', 'zipcode', 'city', 'country', 'vat_number', 'discount', 'quantity', 'total'], 'integer'],
            [['products'], 'safe'],
            [['unit_price', 'sub_total'], 'number'],
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
        $query = Order::find();

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
            'order_id' => $this->order_id,
            'date' => $this->date,
            'invoice_number' => $this->invoice_number,
            'company_name' => $this->company_name,
            'street_name' => $this->street_name,
            'house_number' => $this->house_number,
            'appendix' => $this->appendix,
            'zipcode' => $this->zipcode,
            'city' => $this->city,
            'country' => $this->country,
            'vat_number' => $this->vat_number,
            'discount' => $this->discount,
            'quantity' => $this->quantity,
            'unit_price' => $this->unit_price,
            'sub_total' => $this->sub_total,
            'total' => $this->total,
        ]);

        $query->andFilterWhere(['like', 'products', $this->products]);

        return $dataProvider;
    }
}
