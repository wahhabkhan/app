<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $customers common\models\Customer[] */

$this->title = 'Existing Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:150px" class="existing-customers">

    <h2 class="text-danger" style="margin-left:380px"><?= Html::encode($this->title) ?></h2>

    <p style="margin-left:10px">
        <?= Html::a('Back to Customer Type Selection', ['order/customer-type-selection'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider([
            'allModels' => $customers,
            'pagination' => false,
        ]),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'customer_id',
            'company_name',
            'i_street_name',
            'i_house_number',
            'i_appendix',
            'i_zipcode',
            'i_city',
            'i_country',
            'vat_number',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{create-order}',
                'buttons' => [
                    'create-order' => function ($url, $model, $key) {
                        $order = $model->orders ? $model->orders[0]->order_id : null;
                        return Html::a('Create Order', ['order/create', 'customer_id' => $model->customer_id], ['class' => 'btn btn-danger']);

                    },
                    
                ],
            ],
        ],
    ]); ?>

</div>
