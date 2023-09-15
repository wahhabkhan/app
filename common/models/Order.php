<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $order_id
 * @property int $date
 * @property int $invoice_number
 * @property int $company_name
 * @property int $street_name
 * @property int $house_number
 * @property int $appendix
 * @property int $zipcode
 * @property int $city
 * @property int $country
 * @property int $vat_number
 * @property int $discount
 * @property string $products
 * @property int $quantity
 * @property float $unit_price
 * @property float $sub_total
 * @property int $total
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
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
            [['date', 'invoice_number', 'company_name', 'street_name', 'house_number', 'appendix', 'zipcode', 'city', 'country', 'vat_number', 'discount', 'products', 'quantity', 'unit_price', 'sub_total', 'total'], 'required'],
            [['date', 'invoice_number', 'company_name', 'street_name', 'house_number', 'appendix', 'zipcode', 'city', 'country', 'vat_number', 'discount', 'quantity', 'total'], 'integer'],
            [['unit_price', 'sub_total'], 'number'],
            [['products'], 'string', 'max' => 255],
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
            'products' => 'Products',
            'quantity' => 'Quantity',
            'unit_price' => 'Unit Price',
            'sub_total' => 'Sub Total',
            'total' => 'Total',
        ];
    }
}
