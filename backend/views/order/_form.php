<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Product;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\Order $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div style="margin-left: 180px" class="order-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row ">
        <div class="col-md-4">
    <?= $form->field($model, 'date')->textInput(['id' => 'date-input']) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'invoice_number')->textInput(['value' => $model->invoice_number, 'readonly' => true]) ?>
</div>
</div>
    <div class="row ">
        <div class="col-md-3">
    <?= $form->field($model, 'company_name')->textInput() ?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model, 'street_name')->textInput() ?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model, 'house_number')->textInput() ?>
    </div>
    </div>
    <div class="row ">
    <div class="col-md-3">
    <?= $form->field($model, 'appendix')->textInput() ?>
    </div>
        <div class="col-md-3">
    <?= $form->field($model, 'zipcode')->textInput() ?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model, 'city')->textInput() ?>
    </div>
</div>
<div class="row ">
    <div class="col-md-3">
    <?= $form->field($model, 'country')->textInput() ?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model, 'vat_number')->textInput() ?>
    </div>
    </div>
    




    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    // Function to format the current date as yyyy-mm-dd
    function formatDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    // Function to set the current date in the input field
    function setCurrentDate() {
        const currentDate = new Date();
        const formattedDate = formatDate(currentDate);
        document.getElementById('date-input').value = formattedDate;
    }

    // Call the setCurrentDate function when the page loads
    window.onload = setCurrentDate;

</script>