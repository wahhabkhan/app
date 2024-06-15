<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "manager".
 *
 * @property int $manager_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 */
class Manager extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manager';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
          //  [['first_name', 'last_name', 'email', 'phone'], 'required'],
            [['first_name', 'last_name', 'email', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'manager_id' => 'Manager ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'phone' => 'Phone',
        ];
    }
}
