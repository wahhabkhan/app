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
 * @property int $supplier_id
 *
 * @property Supplier $supplier
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
       //     [['raw_material_name', 'supplier_code', 'unit', 'low_stock', 'supplier_id'], 'required'],
            [['supplier_id'], 'integer'],
            [['raw_material_name', 'supplier_code', 'unit', 'low_stock','current_stock'], 'string', 'max' => 255],
            [['supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Supplier::class, 'targetAttribute' => ['supplier_id' => 'supplier_id']],
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
            'low_stock' => 'Min Stock',
            'current_stock' => 'Current Stock',
            'supplier_id' => 'Supplier',
        ];
    }

    /**
     * Gets query for [[Supplier]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupplierName()
    {
        // Check if supplier_id is set, and if so, fetch the corresponding supplier's name
        $supplier = Supplier::findOne($this->supplier_id);
        return $supplier ? $supplier->company_name : 'N/A';
    }
}
