<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "production_employees_work".
 *
 * @property int $work_id
 * @property string $date
 * @property string $working_hours
 * @property int $production_employees_employees_id
 *
 * @property ProductionEmployees $productionEmployeesEmployees
 */
class ProductionEmployeesWork extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'production_employees_work';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
         //   [['date', 'working_hours', 'production_employees_employees_id'], 'required'],
            [['production_employees_employees_id'], 'integer'],
            [['date', 'working_hours'], 'string', 'max' => 255],
            [['production_employees_employees_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductionEmployees::class, 'targetAttribute' => ['production_employees_employees_id' => 'employees_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'work_id' => 'Work ID',
            'date' => 'Date',
            'working_hours' => 'Working Hours',
            'production_employees_employees_id' => 'Production Employee',
        ];
    }

    /**
     * Gets query for [[ProductionEmployeesEmployees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductionEmployeesEmployees()
    {
        return $this->hasOne(ProductionEmployees::class, ['employees_id' => 'production_employees_employees_id']);
    }
}
