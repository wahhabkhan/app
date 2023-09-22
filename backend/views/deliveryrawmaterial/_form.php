<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\DeliveryRawMaterial $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div style="margin-left:180px" class="delivery-raw-material-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'supplier_company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'raw_material_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'is_packaging_ok')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'batch_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'expiration_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit')->textInput() ?>

    <?= $form->field($model, 'total_units')->textInput() ?>

    <?= $form->field($model, 'price_per_unit')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
