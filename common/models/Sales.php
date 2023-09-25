<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sales".
 *
 * @property int $sales_id
 * @property int $total_sales
 * @property int $total_outstanding
 */
class Sales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
        //    [['total_sales', 'total_outstanding'], 'required'],
            [['total_sales', 'total_outstanding'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sales_id' => 'Sales ID',
            'total_sales' => 'Total Sales',
            'total_outstanding' => 'Total Outstanding',
        ];
    }
}
