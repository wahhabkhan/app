<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Production Employees Work';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:180px" class="production-employees-work-index">

    <h2 class="text-danger text-center mt-3"><?= Html::encode($this->title) ?></h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'work_id',
            'date',
            'working_hours',
            

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        return ['production-employees-work/view', 'work_id' => $model->work_id];
                    }
                    if ($action === 'update') {
                        return ['production-employees-work/update', 'work_id' => $model->work_id];
                    }
                    if ($action === 'delete') {
                        return ['production-employees-work/delete', 'work_id' => $model->work_id];
                    }
                },
            ],
        ],
    ]); ?>
</div>
