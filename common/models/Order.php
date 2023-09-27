<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $order_id
 * @property string $date
 * @property int $invoice_number
 * @property string $company_name
 * @property string $street_name
 * @property string $house_number
 * @property string $appendix
 * @property string $zipcode
 * @property string $city
 * @property string $country
 * @property string $vat_number
 * @property float $discount
 *
 * @property OrderItems[] $orderItems
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $id;


    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           // [['date', 'invoice_number', 'company_name', 'street_name', 'house_number', 'appendix', 'zipcode', 'city', 'country', 'vat_number', 'discount'], 'required'],
            [['date'], 'safe'],
            [['invoice_number'], 'integer'],
            [['discount'], 'number'],
            [['company_name', 'street_name', 'house_number', 'appendix', 'zipcode', 'city', 'country', 'vat_number'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'date' => 'Date',
            'invoice_number' => 'Invoice Number',
            'company_name' => 'Company Name',
            'street_name' => 'Street Name',
            'house_number' => 'House Number',
            'appendix' => 'Appendix',
            'zipcode' => 'Zipcode',
            'city' => 'City',
            'country' => 'Country',
            'vat_number' => 'Vat Number',
            'discount' => 'Discount',
        ];
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::class, ['order_id' => 'order_id']);
    }
    public function getCustomer()
    {
        // Assuming you have a foreign key named `customer_id` in the Order table
        return $this->hasOne(Customer::className(), ['customer_id' => 'customer_id']);
    }
}
