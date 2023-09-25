<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Raws';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:180px" class="customer-index">

    <h2 class="text-danger text-center"><?= Html::encode($this->title) ?></h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'product_raw_id',
            'raw_material_name',
            'unit',
            'weight',
            

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        return ['product-raw/view', 'product_raw_id' => $model->product_raw_id];
                    }
                    if ($action === 'update') {
                        return ['product-raw/update', 'product_raw_id' => $model->product_raw_id];
                    }
                    if ($action === 'delete') {
                        return ['product-raw/delete', 'product_raw_id' => $model->product_raw_id];
                    }
                },
            ],
        ],
    ]); ?>
</div>
