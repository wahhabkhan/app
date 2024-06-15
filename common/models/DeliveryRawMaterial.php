<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "delivery_raw_material".
 *
 * @property int $delivery_raw_id
 * @property string $supplier_company_name
 * @property string $raw_material_name
 * @property string $date
 * @property string $is_packaging_ok
 * @property string $batch_no
 * @property string $expiration_date
 * @property int $unit
 * @property int $total_units
 * @property int $price_per_unit
 */
class DeliveryRawMaterial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'delivery_raw_material';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
          //  [['supplier_company_name', 'raw_material_name', 'date', 'is_packaging_ok', 'batch_no', 'expiration_date', 'unit', 'total_units', 'price_per_unit'], 'required'],
            [['date'], 'safe'],
            [['is_packaging_ok'], 'boolean'],
            [['supplier_company_name', 'raw_material_name',  'batch_no', 'expiration_date','unit', 'total_units', 'price_per_unit'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'delivery_raw_id' => 'Delivery Raw ID',
            'supplier_company_name' => 'Supplier Company Name',
            'raw_material_name' => 'Raw Material Name',
            'date' => 'Date',
            'is_packaging_ok' => 'Is Packaging Ok',
            'batch_no' => 'Batch No',
            'expiration_date' => 'Expiration Date',
            'unit' => 'Unit',
            'total_units' => 'Total Units',
            'price_per_unit' => 'Price Per Unit',
        ];
    }
    public function beforeSave($insert)
{
    if (parent::beforeSave($insert)) {
        // Convert user-friendly "Yes"/"No" to boolean (1/0)
        $this->is_packaging_ok = ($this->is_packaging_ok === 'Yes') ? 1 : 0;
        return true;
    }
    return false;
}

public function afterFind()
{
    parent::afterFind();
    // Convert boolean (1/0) to user-friendly "Yes"/"No"
    $this->is_packaging_ok = ($this->is_packaging_ok == 1) ? 'Yes' : 'No';
}
}
