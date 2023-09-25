<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customer_contact".
 *
 * @property int $contact_id
 * @property string $first_name
 * @property string $last_name
 * @property string $position
 * @property string $email
 * @property string $phone_number1
 * @property string $phone_number2
 * @property string $phone_number3
 * @property int $customer_id
 *
 * @property Customer $customer
 */
class CustomerContact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer_contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
        //    [['first_name', 'last_name', 'position', 'email', 'phone_number1', 'phone_number2', 'phone_number3', 'customer_id'], 'required'],
            [['customer_id'], 'integer'],
            [['first_name', 'last_name', 'position', 'email', 'phone_number1', 'phone_number2', 'phone_number3'], 'string', 'max' => 255],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::class, 'targetAttribute' => ['customer_id' => 'customer_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'contact_id' => 'Contact ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'position' => 'Position',
            'email' => 'Email',
            'phone_number1' => 'Phone Number1',
            'phone_number2' => 'Phone Number2',
            'phone_number3' => 'Phone Number3',
            'customer_id' => 'Customer ID',
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::class, ['customer_id' => 'customer_id']);
    }
}
