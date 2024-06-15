<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $customer_id
 * @property string $company_name
 * @property string $i_street_name
 * @property string $i_house_number
 * @property string $i_appendix
 * @property string $i_zipcode
 * @property string $i_city
 * @property string $i_country
 * @property string $d_street_name
 * @property string $d_house_number
 * @property string $d_appendix
 * @property string $d_zipcode
 * @property string $d_city
 * @property string $d_country
 * @property string $vat_number
 * @property string $coc_number
 * @property string $invoice_email
 * @property string $delivery_notes
 * @property string $notes
 *
 * @property CustomerContact[] $customerContacts
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $same_as_delivery;

    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           // [['company_name', 'i_street_name', 'i_house_number', 'i_appendix', 'i_zipcode', 'i_city', 'i_country', 'd_street_name', 'd_house_number', 'd_appendix', 'd_zipcode', 'd_city', 'd_country', 'vat_number', 'coc_number', 'invoice_email', 'delivery_notes', 'notes'], 'required'],
            [['company_name', 'i_street_name', 'i_house_number', 'i_appendix', 'i_zipcode', 'i_city', 'i_country', 'd_street_name', 'd_house_number', 'd_appendix', 'd_zipcode', 'd_city', 'd_country', 'vat_number', 'coc_number', 'invoice_email', 'delivery_notes', 'notes'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => 'Customer ID',
            'company_name' => 'Company Name',
            'i_street_name' => 'Street Name',
            'i_house_number' => 'House Number',
            'i_appendix' => 'Appendix',
            'i_zipcode' => 'Zipcode',
            'i_city' => 'City',
            'i_country' => 'Country',
            'd_street_name' => 'Street Name',
            'd_house_number' => 'House Number',
            'd_appendix' => 'Appendix',
            'd_zipcode' => 'Zipcode',
            'd_city' => 'City',
            'd_country' => 'Country',
            'vat_number' => 'Vat Number',
            'coc_number' => 'Coc Number',
            'invoice_email' => 'Invoice Email',
            'delivery_notes' => 'Delivery Notes',
            'notes' => 'Notes',
        ];
    }

    /**
     * Gets query for [[CustomerContacts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerContacts()
    {
        return $this->hasMany(CustomerContact::class, ['customer_id' => 'customer_id']);
    }
    public function getOrders()
{
    return $this->hasMany(Order::class, ['customer_id' => 'customer_id']);
}


    
}
