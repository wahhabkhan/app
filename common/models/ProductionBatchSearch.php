<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductionBatch;

/**
 * ProductionBatchSearch represents the model behind the search form of `common\models\ProductionBatch`.
 */
class ProductionBatchSearch extends ProductionBatch
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['batch_id'], 'integer'],
            [['date', 'production_name', 'total_units', 'expiration_date', 'batch_number', 'employee_name'], 'safe'],
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
        $query = ProductionBatch::find();

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
            'batch_id' => $this->batch_id,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'production_name', $this->production_name])
            ->andFilterWhere(['like', 'total_units', $this->total_units])
            ->andFilterWhere(['like', 'expiration_date', $this->expiration_date])
            ->andFilterWhere(['like', 'batch_number', $this->batch_number])

            ->andFilterWhere(['like', 'employee_name', $this->employee_name]);

        return $dataProvider;
    }
}
