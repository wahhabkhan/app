<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
use common\models\ProductionEmployees;

/** @var yii\web\View $this */
/** @var common\models\ProductionBatch $model */
/** @var yii\widgets\ActiveForm $form */


// Fetch the list of employee names from the ProductionEmployees model
$employeeNames = ArrayHelper::map(ProductionEmployees::find()->all(), 'employees_id', function($model) {
    return $model->first_name . ' ' . $model->last_name;
});
?>

<div style="margin-left:380px" class="production-batch-form w-50 mt-3">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row ">
        <div class="col-md-4">
    <?= $form->field($model, 'date') ?>
</div>
</div>
<div class="row ">
        <div class="col-md-4">
    <?= $form->field($model, 'production_name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'total_units')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'expiration_date')->widget(DatePicker::classname(), [
    'options' => ['class' => 'form-control'],
    'dateFormat' => 'yyyy-MM-dd', 
]) ?>
</div>
</div>

<div class="row ">
        <div class="col-md-4">
    <?= $form->field($model, 'batch_number')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'employee_name')->dropDownList(
        $employeeNames, // The list of employee names
        ['prompt' => 'Select Employee'] // Optional, to add a prompt
    ) ?>
    </div>
</div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
