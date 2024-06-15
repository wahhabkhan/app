<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_items".
 *
 * @property int $order_items_id
 * @property string|null $product
 * @property float|null $var_rate
 * @property int|null $quantity
 * @property float|null $unit_price
 * @property float|null $sub_total
 * @property int $order_id
 *
 * @property Order $order
 */
class OrderItems extends \yii\db\ActiveRecord
{
    public $customer_id;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'unit_price', 'sub_total'], 'number'],
            [['var_rate','quantity', 'order_id'], 'integer'],
            [['order_id'], 'required'],
            [['product'], 'string', 'max' => 255],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'order_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_items_id' => 'Order Items ID',
            'product' => 'Product',
            'var_rate' => 'Var Rate',
            'quantity' => 'Quantity',
            'unit_price' => 'Unit Price',
            'sub_total' => 'Sub Total',
            'order_id' => 'Order ID',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['order_id' => 'order_id']);
    }
}
