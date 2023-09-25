<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:180px" class="product-index">

    <h2 class="text-danger text-center"><?= Html::encode($this->title) ?></h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'product_id',
            'product_name',
            'barcode',
            'volume_or_weight',
            
            

            // Additional columns as needed...

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {add-rm} {view-rm}',
                'buttons' => [
                    'add-rm' => function ($url, $model, $key) {
                        return Html::a('Add Raw Material', ['product-raw/create', 'product_raw_id' => $model->product_id], ['class' => 'btn btn-danger']);
                    },
                    'view-rm' => function ($url, $model, $key) {
                        return Html::a('View Raw Material', ['product-raw/index', 'product_raw_id' => $model->product_id], ['class' => 'btn btn-danger']);
                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        return ['product/view', 'product_id' => $model->product_id];
                    }
                    if ($action === 'update') {
                        return ['product/update', 'product_id' => $model->product_id];
                    }
                    if ($action === 'delete') {
                        return ['product/delete', 'product_id' => $model->product_id];
                    }
                },
            ],
        ],
    ]); ?>
</div>
