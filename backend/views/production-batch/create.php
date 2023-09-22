<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProductionBatch $model */

$this->title = 'Create Production Batch';
$this->params['breadcrumbs'][] = ['label' => 'Production Batches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="production-batch-create">

    <h1 style="margin-left:180px"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
