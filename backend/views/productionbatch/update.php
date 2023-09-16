<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProductionBatch $model */

$this->title = 'Update Production Batch: ' . $model->batch_id;
$this->params['breadcrumbs'][] = ['label' => 'Production Batches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->batch_id, 'url' => ['view', 'batch_id' => $model->batch_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="production-batch-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
