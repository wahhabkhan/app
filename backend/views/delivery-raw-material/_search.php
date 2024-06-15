<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\DeliveryRawMaterialSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="delivery-raw-material-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'delivery_raw_id') ?>

    <?= $form->field($model, 'supplier_company_name') ?>

    <?= $form->field($model, 'raw_material_name') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'is_packaging_ok') ?>

    <?php // echo $form->field($model, 'batch_no') ?>

    <?php // echo $form->field($model, 'expiration_date') ?>

    <?php // echo $form->field($model, 'unit') ?>

    <?php // echo $form->field($model, 'total_units') ?>

    <?php // echo $form->field($model, 'price_per_unit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
