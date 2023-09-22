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

<div style="margin-left:180px" class="production-batch-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'production_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_units')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'expiration_date')->widget(DatePicker::classname(), [
    'options' => ['class' => 'form-control'],
    'dateFormat' => 'yyyy-MM-dd', 
]) ?>

    <?= $form->field($model, 'batch_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_name')->dropDownList(
        $employeeNames, // The list of employee names
        ['prompt' => 'Select Employee'] // Optional, to add a prompt
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
