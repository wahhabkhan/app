<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Supplier;
use yii\helpers\ArrayHelper;


/** @var yii\web\View $this */
/** @var common\models\SupplierContact $model */
/** @var yii\widgets\ActiveForm $form */
$employees = Supplier::find()->all();
$employeesList = ArrayHelper::map($employees, 'supplier_id', 'supplier_id');
?>

<div style="margin-left:180px" class="supplier-contact-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'supplier_id')->dropDownList(
               $employeesList,
               ['prompt' => 'Select Supplier']
               ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
