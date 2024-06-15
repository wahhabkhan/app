<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\OrderItems $model */

$this->title = $model->order_items_id;
$this->params['breadcrumbs'][] = ['label' => 'Order Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div style="margin-left:380px" class="order-items-view w-50">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'order_items_id' => $model->order_items_id], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Delete', ['delete', 'order_items_id' => $model->order_items_id], [
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
        ],
    ]) ?>

</div>
