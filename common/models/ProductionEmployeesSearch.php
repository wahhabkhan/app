<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductionEmployees;

/**
 * ProductionEmployeesSearch represents the model behind the search form of `common\models\ProductionEmployees`.
 */
class ProductionEmployeesSearch extends ProductionEmployees
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employees_id'], 'integer'],
            [['first_name', 'last_name', 'phone_number', 'email', 'street', 'house_number', 'appendix', 'zipcode', 'city'], 'safe'],
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
        $query = ProductionEmployees::find();

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
            'employees_id' => $this->employees_id,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'house_number', $this->house_number])
            ->andFilterWhere(['like', 'appendix', $this->appendix])
            ->andFilterWhere(['like', 'zipcode', $this->zipcode])
            ->andFilterWhere(['like', 'city', $this->city]);

        return $dataProvider;
    }
}
