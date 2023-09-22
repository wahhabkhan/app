<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Order $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div style="margin-left:180px" class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'invoice_number')->textInput() ?>

    <?= $form->field($model, 'company_name')->textInput() ?>

    <?= $form->field($model, 'street_name')->textInput() ?>

    <?= $form->field($model, 'house_number')->textInput() ?>

    <?= $form->field($model, 'appendix')->textInput() ?>

    <?= $form->field($model, 'zipcode')->textInput() ?>

    <?= $form->field($model, 'city')->textInput() ?>

    <?= $form->field($model, 'country')->textInput() ?>

    <?= $form->field($model, 'vat_number')->textInput() ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <?= $form->field($model, 'products')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'unit_price')->textInput() ?>

    <?= $form->field($model, 'sub_total')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
