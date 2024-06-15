<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Customer $model */

$this->title = $model->customer_id;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

// Define custom attribute labels
$attributeLabels = [
    'i_street_name' => 'Invoicing Street Name',
    'i_house_number' => 'Invoicing House Number',
    'i_appendix' => 'Invoicing Appendix',
    'i_zipcode' => 'Invoicing Zipcode',
    'i_city' => 'Invoicing City',
    'i_country' => 'Invoicing Country',
    'd_street_name' => 'Delivery Street Name',
    'd_house_number' => 'Delivery House Number',
    'd_appendix' => 'Delivery Appendix',
    'd_zipcode' => 'Delivery Zipcode',
    'd_city' => 'Delivery City',
    'd_country' => 'Delivery Country',
];
?>
<div style="margin-left: 350px" class="customer-view w-50">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'customer_id' => $model->customer_id], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Delete', ['delete', 'customer_id' => $model->customer_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'customer_id',
            'company_name',
            [
                'attribute' => 'i_street_name',
                'label' => $attributeLabels['i_street_name'], // Custom label
            ],
            [
                'attribute' => 'i_house_number',
                'label' => $attributeLabels['i_house_number'], // Custom label
            ],
            [
                'attribute' => 'i_appendix',
                'label' => $attributeLabels['i_appendix'], // Custom label
            ],
            [
                'attribute' => 'i_zipcode',
                'label' => $attributeLabels['i_zipcode'], // Custom label
            ],
            [
                'attribute' => 'i_city',
                'label' => $attributeLabels['i_city'], // Custom label
            ],
            [
                'attribute' => 'i_country',
                'label' => $attributeLabels['i_country'], // Custom label
            ],
            [
                'attribute' => 'd_street_name',
                'label' => $attributeLabels['d_street_name'], // Custom label
            ],
            [
                'attribute' => 'd_house_number',
                'label' => $attributeLabels['d_house_number'], // Custom label
            ],
            [
                'attribute' => 'd_appendix',
                'label' => $attributeLabels['d_appendix'], // Custom label
            ],
            [
                'attribute' => 'd_zipcode',
                'label' => $attributeLabels['d_zipcode'], // Custom label
            ],
            [
                'attribute' => 'd_city',
                'label' => $attributeLabels['d_city'], // Custom label
            ],
            [
                'attribute' => 'd_country',
                'label' => $attributeLabels['d_country'], // Custom label
            ],
            'vat_number',
            'coc_number',
            'invoice_email:email',
            'delivery_notes',
            'notes',
        ],
    ]) ?>



    

</div>
