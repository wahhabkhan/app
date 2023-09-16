<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SalesTargets;

/**
 * SalesTargetsSearch represents the model behind the search form of `common\models\SalesTargets`.
 */
class SalesTargetsSearch extends SalesTargets
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['target_id', 'rep_id'], 'integer'],
            [['month_year', 'sales_target_amount'], 'safe'],
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
        $query = SalesTargets::find();

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
            'target_id' => $this->target_id,
            'rep_id' => $this->rep_id,
        ]);

        $query->andFilterWhere(['like', 'month_year', $this->month_year])
            ->andFilterWhere(['like', 'sales_target_amount', $this->sales_target_amount]);

        return $dataProvider;
    }
}
