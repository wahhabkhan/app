<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_raw".
 *
 * @property int $product_raw_id
 * @property string $raw_material_name
 * @property string $unit
 * @property string $weight
 */
class ProductRaw extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_raw';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
         //   [['raw_material_name', 'unit', 'weight'], 'required'],
            [['raw_material_name', 'unit', 'weight'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_raw_id' => 'Product Raw ID',
            'raw_material_name' => 'Raw Material Name',
            'unit' => 'Unit',
            'weight' => 'Weight',
        ];
    }
}
