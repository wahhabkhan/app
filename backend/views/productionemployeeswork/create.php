<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProductionEmployeesWork $model */

$this->title = 'Create Production Employees Work';
$this->params['breadcrumbs'][] = ['label' => 'Production Employees Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="production-employees-work-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
