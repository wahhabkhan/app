<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProductionEmployeesWork $model */

$this->title = 'Update Production Employees Work: ' . $model->work_id;
$this->params['breadcrumbs'][] = ['label' => 'Production Employees Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->work_id, 'url' => ['view', 'work_id' => $model->work_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="production-employees-work-update">

    <h1 style="margin-left:180px" ><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
