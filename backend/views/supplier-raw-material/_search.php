<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\SupplierRawMaterialSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="supplier-raw-material-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'raw_id') ?>

    <?= $form->field($model, 'raw_material_name') ?>

    <?= $form->field($model, 'supplier_code') ?>

    <?= $form->field($model, 'unit') ?>

    <?= $form->field($model, 'low_stock') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
