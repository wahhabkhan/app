<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Managers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:180px" class="manager-index">

    <h2 class="text-center text-danger"><?= Html::encode($this->title) ?></h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'manager_id',
            'first_name',
            'last_name',
           // 'email:email',
           // 'phone',
            

            // Additional columns as needed...

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        return ['manager/view', 'manager_id' => $model->manager_id];
                    }
                    if ($action === 'update') {
                        return ['manager/update', 'manager_id' => $model->manager_id];
                    }
                    if ($action === 'delete') {
                        return ['manager/delete', 'manager_id' => $model->manager_id];
                    }
                },
            ],
        ],
    ]); ?>
</div>
