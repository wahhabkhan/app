<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Sales $model */

$this->title = 'Update Sales: ' . $model->sales_id;
$this->params['breadcrumbs'][] = ['label' => 'Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sales_id, 'url' => ['view', 'sales_id' => $model->sales_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
