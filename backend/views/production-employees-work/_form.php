<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use common\models\ProductionEmployees;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\ProductionEmployeesWork $model */
/** @var yii\widgets\ActiveForm $form */


$employees = ProductionEmployees::find()->all();
$employeesList = ArrayHelper::map($employees, 'employees_id', 'first_name');
?>

<div style="margin-left:430px"  class="production-employees-work-form w-25 mt-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
    'options' => ['class' => 'form-control'],
    'dateFormat' => 'yyyy-MM-dd', 
]) ?>

    <?= $form->field($model, 'working_hours')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'production_employees_employees_id')->dropDownList(
               $employeesList,
               ['prompt' => 'Select Employee']
               ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
