<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Production Batches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:180px" class="production-batch-index">

    <h2 class="text-danger text-center mt-3"><?= Html::encode($this->title) ?></h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'batch_id',
            'date',
            'production_name',
            'total_units',
            

            // Additional columns as needed...

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        return ['production-batch/view', 'batch_id' => $model->batch_id];
                    }
                    if ($action === 'update') {
                        return ['production-batch/update', 'batch_id' => $model->batch_id];
                    }
                    if ($action === 'delete') {
                        return ['production-batch/delete', 'batch_id' => $model->batch_id];
                    }
                },
            ],
        ],
    ]); ?>
</div>
