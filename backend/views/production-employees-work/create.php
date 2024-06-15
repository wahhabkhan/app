<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProductionEmployeesWork $model */

$this->title = 'Add Production Employee Work';
$this->params['breadcrumbs'][] = ['label' => 'Production Employees Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="production-employees-work-create">

    <h4 class="text-danger" style="margin-left:380px" ><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
