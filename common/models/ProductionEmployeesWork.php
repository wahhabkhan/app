<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "production_employees_work".
 *
 * @property int $work_id
 * @property string $date
 * @property string $working_hours
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
            [['date', 'working_hours'], 'required'],
            [['date', 'working_hours'], 'string', 'max' => 255],
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
        ];
    }
}
