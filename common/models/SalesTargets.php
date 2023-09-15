<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sales_targets".
 *
 * @property int $target_id
 * @property string|null $month_year
 * @property string|null $sales_target_amount
 * @property int $rep_id
 */
class SalesTargets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sales_targets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rep_id'], 'required'],
            [['rep_id'], 'integer'],
            [['month_year', 'sales_target_amount'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'target_id' => 'Target ID',
            'month_year' => 'Month Year',
            'sales_target_amount' => 'Sales Target Amount',
            'rep_id' => 'Rep ID',
        ];
    }
}
