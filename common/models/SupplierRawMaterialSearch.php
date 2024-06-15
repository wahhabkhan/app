<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SupplierRawMaterial;

/**
 * SupplierRawMaterialSearch represents the model behind the search form of `common\models\SupplierRawMaterial`.
 */
class SupplierRawMaterialSearch extends SupplierRawMaterial
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['raw_id', 'supplier_id'], 'integer'],
            [['raw_material_name', 'supplier_code', 'unit', 'low_stock'], 'safe'],
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
        $query = SupplierRawMaterial::find();

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
            'raw_id' => $this->raw_id,
            'supplier_id' => $this->supplier_id,
        ]);

        $query->andFilterWhere(['like', 'raw_material_name', $this->raw_material_name])
            ->andFilterWhere(['like', 'supplier_code', $this->supplier_code])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'low_stock', $this->low_stock]);

        return $dataProvider;
    }
}
