<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SalesTargets $model */

$this->title = 'Create Sales Targets';
$this->params['breadcrumbs'][] = ['label' => 'Sales Targets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-targets-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
