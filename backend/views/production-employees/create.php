<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProductionEmployees $model */

$this->title = 'Add Production Employees';
$this->params['breadcrumbs'][] = ['label' => 'Production Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div  class="production-employees-create">

    <h3 class="text-danger mt-4" style="margin-left:380px"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
