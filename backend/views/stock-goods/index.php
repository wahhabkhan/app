<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stock of  Goods Ready for Sale';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:180px" class="stockgoods-index ">

    <h2 class="text-center text-danger"><?= Html::encode($this->title) ?></h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'stock_id',
            'product_name',
            'count',
            

            // Additional columns as needed...

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        return ['stock-goods/view', 'stock_id' => $model->stock_id];
                    }
                    if ($action === 'update') {
                        return ['stock-goods/update', 'stock_id' => $model->stock_id];
                    }
                    if ($action === 'delete') {
                        return ['stock-goods/delete', 'stock_id' => $model->stock_id];
                    }
                },
            ],
        ],
    ]); ?>
</div>
