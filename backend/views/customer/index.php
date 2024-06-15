<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:180px" class="customer-index">

    <h2 class="text-center text-danger"><?= Html::encode($this->title) ?></h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'customer_id',
            'company_name',
            'i_street_name',
            'i_house_number',
            'i_appendix',
            

            // Additional columns as needed...

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        return ['customer/view', 'customer_id' => $model->customer_id];
                    }
                    if ($action === 'update') {
                        return ['customer/update', 'customer_id' => $model->customer_id];
                    }
                    if ($action === 'delete') {
                        return ['customer/delete', 'customer_id' => $model->customer_id];
                    }
                },
            ],
        ],
    ]); ?>
</div>
