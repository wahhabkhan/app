<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "production_employees".
 *
 * @property int $employees_id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone_number
 * @property string $email
 * @property string $street
 * @property string $house_number
 * @property string $appendix
 * @property string $zipcode
 * @property string $city
 *
 * @property ProductionEmployeesWork[] $productionEmployeesWorks
 */
class ProductionEmployees extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

     
    public static function tableName()
    {
        return 'production_employees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
         //   [['first_name', 'last_name', 'phone_number', 'email', 'street', 'house_number', 'appendix', 'zipcode', 'city'], 'required'],
            [['first_name', 'last_name', 'phone_number', 'email', 'street', 'house_number', 'appendix', 'zipcode', 'city'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'employees_id' => 'Employees ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone_number' => 'Phone Number',
            'email' => 'Email',
            'street' => 'Street',
            'house_number' => 'House Number',
            'appendix' => 'Appendix',
            'zipcode' => 'Zipcode',
            'city' => 'City',
        ];
    }

    /**
     * Gets query for [[ProductionEmployeesWorks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductionEmployeesWorks()
    {
        return $this->hasMany(ProductionEmployeesWork::class, ['production_employees_employees_id' => 'employees_id']);
    }
   


}
