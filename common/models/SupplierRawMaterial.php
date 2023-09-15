<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "supplier_raw_material".
 *
 * @property int $raw_id
 * @property string $raw_material_name
 * @property string $supplier_code
 * @property string $unit
 * @property string $low_stock
 */
class SupplierRawMaterial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supplier_raw_material';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['raw_material_name', 'supplier_code', 'unit', 'low_stock'], 'required'],
            [['raw_material_name', 'supplier_code', 'unit', 'low_stock'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'raw_id' => 'Raw ID',
            'raw_material_name' => 'Raw Material Name',
            'supplier_code' => 'Supplier Code',
            'unit' => 'Unit',
            'low_stock' => 'Low Stock',
        ];
    }
}
