<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SupplierContact;

/**
 * SupplierContactSearch represents the model behind the search form of `common\models\SupplierContact`.
 */
class SupplierContactSearch extends SupplierContact
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['contact_id', 'supplier_id'], 'integer'],
            [['first_name', 'last_name', 'position', 'email', 'phone_number1', 'phone_number2', 'phone_number3'], 'safe'],
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
        $query = SupplierContact::find();

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
            'contact_id' => $this->contact_id,
            'supplier_id' => $this->supplier_id,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone_number1', $this->phone_number1])
            ->andFilterWhere(['like', 'phone_number2', $this->phone_number2])
            ->andFilterWhere(['like', 'phone_number3', $this->phone_number3]);

        return $dataProvider;
    }
}
