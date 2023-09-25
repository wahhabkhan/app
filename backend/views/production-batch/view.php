<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\ProductionBatch $model */

$this->title = $model->batch_id;
$this->params['breadcrumbs'][] = ['label' => 'Production Batches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);


?>
<div style="margin-left:380px" class="production-batch-view w-50">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'batch_id' => $model->batch_id], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Delete', ['delete', 'batch_id' => $model->batch_id], [
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
            'batch_id',
            'date',
            'production_name',
            'total_units',
            'expiration_date',
            'batch_number',

            'employee_name',
        ],
    ]) ?>

</div>
