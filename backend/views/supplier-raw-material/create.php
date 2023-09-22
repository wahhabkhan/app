<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SupplierRawMaterial $model */

$this->title = 'Create Supplier Raw Material';
$this->params['breadcrumbs'][] = ['label' => 'Supplier Raw Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-raw-material-create">

    <h1 style="margin-left:180px"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
