<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Customer;

/**
 * CustomerSearch represents the model behind the search form of `common\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id'], 'integer'],
            [['company_name', 'i_street_name', 'i_house_number', 'i_appendix', 'i_zipcode', 'i_city', 'i_country', 'd_street_name', 'd_house_number', 'd_appendix', 'd_zipcode', 'd_city', 'd_country', 'vat_number', 'coc_number', 'invoice_email', 'delivery_notes', 'notes'], 'safe'],
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
        $query = Customer::find();

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
            'customer_id' => $this->customer_id,
        ]);

        $query->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'i_street_name', $this->i_street_name])
            ->andFilterWhere(['like', 'i_house_number', $this->i_house_number])
            ->andFilterWhere(['like', 'i_appendix', $this->i_appendix])
            ->andFilterWhere(['like', 'i_zipcode', $this->i_zipcode])
            ->andFilterWhere(['like', 'i_city', $this->i_city])
            ->andFilterWhere(['like', 'i_country', $this->i_country])
            ->andFilterWhere(['like', 'd_street_name', $this->d_street_name])
            ->andFilterWhere(['like', 'd_house_number', $this->d_house_number])
            ->andFilterWhere(['like', 'd_appendix', $this->d_appendix])
            ->andFilterWhere(['like', 'd_zipcode', $this->d_zipcode])
            ->andFilterWhere(['like', 'd_city', $this->d_city])
            ->andFilterWhere(['like', 'd_country', $this->d_country])
            ->andFilterWhere(['like', 'vat_number', $this->vat_number])
            ->andFilterWhere(['like', 'coc_number', $this->coc_number])
            ->andFilterWhere(['like', 'invoice_email', $this->invoice_email])
            ->andFilterWhere(['like', 'delivery_notes', $this->delivery_notes])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
