<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Production Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:180px" class="productionemployee-index">

    <h3 class="text-danger text-center mt-4"><?= Html::encode($this->title) ?></h3>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'employees_id',
            'first_name',
            'last_name',
            'phone_number',
            
            

            // Additional columns as needed...

            [

                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {add-work} {view-work}',
                'buttons' => [
                    'add-work' => function ($url, $model, $key) {
                        return Html::a('Add Working Hours', ['production-employees-work/create', 'work_id' => $model->employees_id], ['class' => 'btn btn-danger']);
                    },
                    'view-work' => function ($url, $model, $key) {
                        return Html::a('View Working Hours', ['production-employees-work/index', 'work_id' => $model->employees_id], ['class' => 'btn btn-danger']);
                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        return ['production-employees/view', 'employees_id' => $model->employees_id];
                    }
                    if ($action === 'update') {
                        return ['production-employees/update', 'employees_id' => $model->employees_id];
                    }
                    if ($action === 'delete') {
                        return ['production-employees/delete', 'employees_id' => $model->employees_id];
                    }
                    
                },
                
            ],
        ],
        
    ]); ?>
</div>
