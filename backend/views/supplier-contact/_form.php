<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Supplier;
use yii\helpers\ArrayHelper;


/** @var yii\web\View $this */
/** @var common\models\SupplierContact $model */
/** @var yii\widgets\ActiveForm $form */
$employees = Supplier::find()->all();
$employeesList = ArrayHelper::map($employees, 'supplier_id', 'company_name');
?>

<div style="margin-left:280px" class="supplier-contact-form mt-4">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    <div class="col-md-3">

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
    </div>
</div>

<div class="row">
<div class="col-md-3">
    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-md-3">
    <?= $form->field($model, 'phone_number1')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model, 'phone_number2')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model, 'phone_number3')->textInput(['maxlength' => true]) ?>
    </div>    
</div>
<div class="row">
<div class="col-md-3">
 
</div>
</div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
