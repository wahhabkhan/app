<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Supplier $model */

$this->title = 'Update Supplier: ' . $model->supplier_id;
$this->params['breadcrumbs'][] = ['label' => 'Suppliers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->supplier_id, 'url' => ['view', 'supplier_id' => $model->supplier_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="supplier-update">

    <h3 class="text-danger" style="margin-left:380px" ><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
