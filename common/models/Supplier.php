<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property int $supplier_id
 * @property string $company_name
 * @property string $street_name
 * @property string $house_number
 * @property string $appendix
 * @property string $zipcode
 * @property string $city
 * @property string $country
 * @property string $vat_number
 * @property string $coc_number
 * @property string $email
 * @property string $notes
 *
 * @property SupplierContact[] $supplierContacts
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
          //  [['company_name', 'street_name', 'house_number', 'appendix', 'zipcode', 'city', 'country', 'vat_number', 'coc_number', 'email', 'notes'], 'required'],
            [['company_name', 'street_name', 'house_number', 'appendix', 'zipcode', 'city', 'country', 'vat_number', 'coc_number', 'email', 'notes'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'supplier_id' => 'Supplier ID',
            'company_name' => 'Company Name',
            'street_name' => 'Street Name',
            'house_number' => 'House Number',
            'appendix' => 'Appendix',
            'zipcode' => 'Zipcode',
            'city' => 'City',
            'country' => 'Country',
            'vat_number' => 'Vat Number',
            'coc_number' => 'Coc Number',
            'email' => 'Email',
            'notes' => 'Notes',
        ];
    }

    /**
     * Gets query for [[SupplierContacts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupplierContacts()
    {
        return $this->hasMany(SupplierContact::class, ['supplier_id' => 'supplier_id']);
    }
}
