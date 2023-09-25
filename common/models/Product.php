<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $product_id
 * @property string $product_name
 * @property string $barcode
 * @property string $volume_or_weight
 * @property string $retial_price
 * @property string $wholesale_price
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
         //   [['product_name', 'barcode', 'volume_or_weight', 'retial_price', 'wholesale_price'], 'required'],
            [['product_name', 'barcode', 'volume_or_weight'], 'string', 'max' => 255],
            [['retial_price', 'wholesale_price' ], 'number']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_name' => 'Product Name',
            'barcode' => 'Barcode',
            'volume_or_weight' => 'Volume Or Weight',
            'retial_price' => 'Retial Price',
            'wholesale_price' => 'Wholesale Price',
        ];
    }
}
