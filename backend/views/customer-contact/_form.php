<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\CustomerContact $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div style="margin-left:180px" class="customer-contact-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
