<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:180px" class="manager-index">

    <h2 class="text-center text-danger"><?= Html::encode($this->title) ?></h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'order_id',
            'date',
            'invoice_number',
            'company_name',
            'street_name',
            // 'house_number',
            // 'appendix',
            // 'zipcode',
            // 'city',
            // 'country',
            // 'vat_number',
            // 'discount',
            

            // Additional columns as needed...

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {add-pro} <br> {view-pro}',
                'buttons' => [
                    'add-pro' => function ($url, $model, $key) {
                        return Html::a('Add Items / Products    ', ['order-items/create', 'order_items_id' => $model->order_id], ['class' => 'btn ms-4 btn-danger',]);
                    },
                    'view-pro' => function ($url, $model, $key) {
                        return Html::a('View Items Purchased', ['order-items/index', 'order_id' => $model->order_id], ['class' => 'btn mt-2 btn-danger', 'style' => 'margin-left:85px']);
                    },
                    
                ],      
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        return ['order/view', 'order_id' => $model->order_id];
                    }
                    if ($action === 'update') {
                        return ['order/update', 'order_id' => $model->order_id];
                    }
                    if ($action === 'delete') {
                        return ['order/delete', 'order_id' => $model->order_id];
                    }
                },
                
            ],
        ],
    ]); ?>
</div>
