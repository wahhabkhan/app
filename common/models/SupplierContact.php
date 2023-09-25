<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "supplier_contact".
 *
 * @property int $contact_id
 * @property string $first_name
 * @property string $last_name
 * @property string $position
 * @property string $email
 * @property string $phone_number1
 * @property string $phone_number2
 * @property string $phone_number3
 * @property int $supplier_id
 *
 * @property Supplier $supplier
 */
class SupplierContact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supplier_contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
        //    [['first_name', 'last_name', 'position', 'email', 'phone_number1', 'phone_number2', 'phone_number3'], 'required'],
            [['supplier_id'], 'integer'],
            [['first_name', 'last_name', 'position', 'email', 'phone_number1', 'phone_number2', 'phone_number3'], 'string', 'max' => 255],
           // [['supplier_id'], 'exist', 'skipOnError' => false, 'targetClass' => Supplier::class, 'targetAttribute' => ['supplier_id' => 'supplier_id']],
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
            'supplier_id' => 'Supplier',
        ];
    }

    /**
     * Gets query for [[Supplier]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Supplier::class, ['supplier_id' => 'supplier_id']);
    }
}
