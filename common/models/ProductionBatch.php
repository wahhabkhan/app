<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "production_batch".
 *
 * @property int $batch_id
 * @property string $date
 * @property string $production_name
 * @property string $total_units
 * @property string $expiration_date
 * @property string $batch_number
 * @property string $raw_material
 * @property string $employee_name
 */
class ProductionBatch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'production_batch';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
          //  [['date', 'production_name', 'total_units', 'expiration_date', 'batch_number', 'employee_name'], 'required'],
            [['date'], 'safe'],
            [['production_name', 'total_units', 'expiration_date', 'batch_number' , 'employee_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'batch_id' => 'Batch ID',
            'date' => 'Date',
            'production_name' => 'Production Name',
            'total_units' => 'Total Units',
            'expiration_date' => 'Expiration Date',
            'batch_number' => 'Batch Number',
            
            'employee_name' => 'Employee',
        ];
    }
    

}
