<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProductionEmployees $model */

$this->title = 'Create Production Employees';
$this->params['breadcrumbs'][] = ['label' => 'Production Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="production-employees-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
