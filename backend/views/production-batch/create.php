<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProductionBatch $model */

$this->title = 'Add Production Batch';
$this->params['breadcrumbs'][] = ['label' => 'Production Batches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="production-batch-create">

    <h3 class="text-danger mt-4" style="margin-left:480px"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
