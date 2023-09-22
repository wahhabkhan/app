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
<div style="margin-left:180px" class="production-batch-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'batch_id' => $model->batch_id], ['class' => 'btn btn-primary']) ?>
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
            'raw_material',
            'employee_name',
        ],
    ]) ?>

</div>
