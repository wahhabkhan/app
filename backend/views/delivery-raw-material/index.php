<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Delivery Raw Material';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:180px" class="customer-index">

    <h3 class="text-danger text-center mt-3"><?= Html::encode($this->title) ?></h3>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'delivery_raw_id',
            'supplier_company_name',
            'raw_material_name',
            'date',
            

            // Additional columns as needed...

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        return ['delivery-raw-material/view', 'delivery_raw_id' => $model->delivery_raw_id];
                    }
                    if ($action === 'update') {
                        return ['delivery-raw-material/update', 'delivery_raw_id' => $model->delivery_raw_id];
                    }
                    if ($action === 'delete') {
                        return ['delivery-raw-material/delete', 'delivery_raw_id' => $model->delivery_raw_id];
                    }
                },
            ],
        ],
    ]); ?>
</div>
