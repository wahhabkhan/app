<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\ProductionEmployeesWork $model */

$this->title = $model->work_id;
$this->params['breadcrumbs'][] = ['label' => 'Production Employees Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div style="margin-left:380px"  class="production-employees-work-view w-50">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'work_id' => $model->work_id], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Delete', ['delete', 'work_id' => $model->work_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'work_id',
            'date',
            'working_hours',
            [
                'attribute' => 'production_employees_employees_id',
                'value' => function ($model) {
                    return $model->productionEmployeesEmployees->first_name;
                },
            ],
        ],
    ]) ?>

</div>
