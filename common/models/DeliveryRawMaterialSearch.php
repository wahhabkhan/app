<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DeliveryRawMaterial;

/**
 * DeliveryRawMaterialSearch represents the model behind the search form of `common\models\DeliveryRawMaterial`.
 */
class DeliveryRawMaterialSearch extends DeliveryRawMaterial
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['delivery_raw_id', 'unit', 'total_units', 'price_per_unit'], 'integer'],
            [['supplier_company_name', 'raw_material_name', 'date', 'is_packaging_ok', 'batch_no', 'expiration_date'], 'safe'],
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
        $query = DeliveryRawMaterial::find();

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
            'delivery_raw_id' => $this->delivery_raw_id,
            'date' => $this->date,
            'unit' => $this->unit,
            'total_units' => $this->total_units,
            'price_per_unit' => $this->price_per_unit,
        ]);

        $query->andFilterWhere(['like', 'supplier_company_name', $this->supplier_company_name])
            ->andFilterWhere(['like', 'raw_material_name', $this->raw_material_name])
            ->andFilterWhere(['like', 'is_packaging_ok', $this->is_packaging_ok])
            ->andFilterWhere(['like', 'batch_no', $this->batch_no])
            ->andFilterWhere(['like', 'expiration_date', $this->expiration_date]);

        return $dataProvider;
    }
}
