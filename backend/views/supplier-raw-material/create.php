<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SupplierRawMaterial $model */

$this->title = 'Add Supplier Raw Material';
$this->params['breadcrumbs'][] = ['label' => 'Supplier Raw Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-raw-material-create">

    <h3 class="text-danger mt-4 mb-4" style="margin-left:380px"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
