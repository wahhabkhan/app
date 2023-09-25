<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProductionEmployees $model */

$this->title = 'Update Production Employee: ' . $model->employees_id;
$this->params['breadcrumbs'][] = ['label' => 'Production Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employees_id, 'url' => ['view', 'employees_id' => $model->employees_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="production-employees-update">

    <h3 class="text-danger mt-4" style="margin-left:380px"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
