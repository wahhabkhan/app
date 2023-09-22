<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProductionEmployees $model */

$this->title = 'Update Production Employees: ' . $model->employees_id;
$this->params['breadcrumbs'][] = ['label' => 'Production Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employees_id, 'url' => ['view', 'employees_id' => $model->employees_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="production-employees-update">

    <h1 style="margin-left:180px"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
