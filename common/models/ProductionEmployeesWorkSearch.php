<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductionEmployeesWork;

/**
 * ProductionEmployeesWorkSearch represents the model behind the search form of `common\models\ProductionEmployeesWork`.
 */
class ProductionEmployeesWorkSearch extends ProductionEmployeesWork
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['work_id', 'production_employees_employees_id'], 'integer'],
            [['date', 'working_hours'], 'safe'],
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
        $query = ProductionEmployeesWork::find();

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
            'work_id' => $this->work_id,
            'production_employees_employees_id' => $this->production_employees_employees_id,
        ]);

        $query->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'working_hours', $this->working_hours]);

        return $dataProvider;
    }
}
