<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "raw_material_report".
 *
 * @property int $raw_id
 * @property string $start_date
 * @property string $end_date
 */
class RawMaterialReport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'raw_material_report';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
         //   [['start_date', 'end_date'], 'required'],
            [['start_date', 'end_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'raw_id' => 'Raw ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
        ];
    }
}
