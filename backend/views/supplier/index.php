<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Suppliers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:180px" class="product-index">

    <h2 class="text-danger text-center"><?= Html::encode($this->title) ?></h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'supplier_id',
            'company_name',
            'street_name',
            'house_number',
            
            

            // Additional columns as needed...

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {add-rm} {view-rm} <br> <br> {add-raw} {view-raw}',
                'buttons' => [
                    'add-rm' => function ($url, $model, $key) {
                        return Html::a('Add Contacts', ['supplier-contact/create', 'contact_id' => $model->supplier_id], ['class' => 'btn btn-primary']);
                    },
                    'view-rm' => function ($url, $model, $key) {
                        return Html::a('View Contacts', ['supplier-contact/index', 'contact_id' => $model->supplier_id], ['class' => 'btn btn-primary']);
                    },
                    'add-raw' => function ($url, $model, $key) {
                        // Replace 'RawMaterialController/create' with the actual route for adding raw material
                        return Html::a('Add Raw Material', ['supplier-raw-material/create', 'raw_id' => $model->supplier_id], ['class' => 'btn  btn-danger']);
                    },
                    'view-raw' => function ($url, $model, $key) {
                        // Replace 'RawMaterialViewController/index' with the actual route for viewing raw material
                        return Html::a('View Raw Material', ['supplier-raw-material/index', 'raw_id' => $model->supplier_id], ['class' => 'btn btn-danger']);
                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        return ['supplier/view', 'supplier_id' => $model->supplier_id];
                    }
                    if ($action === 'update') {
                        return ['supplier/update', 'supplier_id' => $model->supplier_id];
                    }
                    if ($action === 'delete') {
                        return ['supplier/delete', 'supplier_id' => $model->supplier_id];
                    }
                },
            ],
        ],
    ]); ?>
</div>
