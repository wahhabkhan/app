<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products Purchased';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:180px" class="customer-index">

<h2 class="text-danger text-center"><?= Html::encode($this->title) ?></h2>

<?= Html::a('Add Product', ['order-items/create', 'order_id' => $order_id], ['class' => 'btn btn-danger mt-3 mb-2']) ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'order_items_id',
        'product',
        'var_rate',
        'quantity',
        'unit_price',
        [
            'attribute' => 'sub_total',
            'value' => function ($model) {
                // Calculate sub_total based on quantity and unit_price
                $vt =  $model->var_rate/100;
                $total = $model->quantity * $model->unit_price;
                $vt_amount = $total * $vt;
                return $total + $vt_amount;
            },
        ],
        'order_id',

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            'urlCreator' => function ($action, $model, $key, $index) {
                if ($action === 'view') {
                    return ['order-items/view', 'order_items_id' => $model->order_items_id];
                }
                if ($action === 'update') {
                    return ['order-items/update', 'order_items_id' => $model->order_items_id];
                }
                if ($action === 'delete') {
                    return ['order-items/delete', 'order_items_id' => $model->order_items_id];
                }
            },
        ],
    ],
]); ?>
<p style="margin-left: 800px">
    <?= Html::a('Generate PDF', ['generate-pdf', 'order_id' => $order_id], ['class' => 'btn btn-danger', 'target' => '_blank']) ?>
</p>


</div>
