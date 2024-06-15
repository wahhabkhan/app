<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ProductionEmployees $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div style="margin-left:180px" class="production-employees-form w-75">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row ">
        <div class="col-md-4">

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
</div>
    <div class="col-md-4">
    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>
    </div>
    </div>

    <div class="row ">
        <div class="col-md-4">
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'house_number')->textInput(['maxlength' => true]) ?>
    </div>
    </div>

    <div class="row ">
        <div class="col-md-4">
    <?= $form->field($model, 'appendix')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'zipcode')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
