<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProductionBatch $model */

$this->title = 'Update Production Batch: ' . $model->batch_id;
$this->params['breadcrumbs'][] = ['label' => 'Production Batches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->batch_id, 'url' => ['view', 'batch_id' => $model->batch_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div  class="production-batch-update">

    <h3 class="text-danger" style="margin-left:430px"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
