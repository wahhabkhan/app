<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SupplierRawMaterial $model */

$this->title = 'Update Supplier Raw Material: ' . $model->raw_id;
$this->params['breadcrumbs'][] = ['label' => 'Supplier Raw Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->raw_id, 'url' => ['view', 'raw_id' => $model->raw_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div   class="supplier-raw-material-update">

    <h3 class="text-danger mt-4" style="margin-left:350px"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
