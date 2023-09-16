<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Customer $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'i_street_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'i_house_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'i_appendix')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'i_zipcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'i_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'i_country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'd_street_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'd_house_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'd_appendix')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'd_zipcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'd_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'd_country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vat_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coc_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'invoice_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'delivery_notes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notes')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
