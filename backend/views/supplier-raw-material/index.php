<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Supplier Raw Material';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:180px" class="supplier-raw-index">

    <h2 class="text-center text-danger mt-2"><?= Html::encode($this->title) ?></h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'raw_id',
            'raw_material_name',
            'supplier_code',
            [
                'attribute' => 'supplier_id',
                'label' => 'Supplier',
                'value' => function ($model) {
                    // Use the $model->supplierName attribute to get the supplier's name
                    return $model->supplierName;
                },
            ],
            

            // Additional columns as needed...

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        return ['supplier-raw-material/view', 'raw_id' => $model->raw_id];
                    }
                    if ($action === 'update') {
                        return ['supplier-raw-material/update', 'raw_id' => $model->raw_id];
                    }
                    if ($action === 'delete') {
                        return ['supplier-raw-material/delete', 'raw_id' => $model->raw_id];
                    }
                },
            ],
        ],
    ]); ?>
</div>
