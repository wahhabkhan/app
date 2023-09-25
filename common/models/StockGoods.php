<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stock_goods".
 *
 * @property int $stock_id
 * @property string $product_name
 * @property int $count
 */
class StockGoods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock_goods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
        //    [['product_name', 'count'], 'required'],
            [['count'], 'integer'],
            [['product_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'stock_id' => 'Stock ID',
            'product_name' => 'Product Name',
            'count' => 'Count',
        ];
    }
}
