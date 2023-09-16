<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\RawMaterialReport $model */

$this->title = 'Update Raw Material Report: ' . $model->raw_id;
$this->params['breadcrumbs'][] = ['label' => 'Raw Material Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->raw_id, 'url' => ['view', 'raw_id' => $model->raw_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="raw-material-report-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
