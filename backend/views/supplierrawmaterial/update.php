<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SupplierRawMaterial $model */

$this->title = 'Update Supplier Raw Material: ' . $model->raw_id;
$this->params['breadcrumbs'][] = ['label' => 'Supplier Raw Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->raw_id, 'url' => ['view', 'raw_id' => $model->raw_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="supplier-raw-material-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
