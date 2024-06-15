<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Customer $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div style="margin-left:350px" class="customer-form w-50">

<?php $form = ActiveForm::begin(); ?>
<div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

<h6 class="text-danger">Delivery Address:</h6>

<!-- Checkbox for indicating same delivery address -->

<div class="row">
<div class="col-md-4">
<?= $form->field($model, 'd_street_name')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-4">
<?= $form->field($model, 'd_house_number')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-4">
<?= $form->field($model, 'd_appendix')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-4">
<?= $form->field($model, 'd_zipcode')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-4">
<?= $form->field($model, 'd_city')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-4">
<?= $form->field($model, 'd_country')->textInput(['maxlength' => true]) ?>
</div>
</div>

<?= $form->field($model, 'same_as_delivery')->checkbox(['id' => 'same_as_delivery']) ?>

<h6 class="text-danger">Invoicing Address:</h6>
<div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'i_street_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'i_house_number')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">   
<?= $form->field($model, 'i_appendix')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-4">
<?= $form->field($model, 'i_zipcode')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-4">
<?= $form->field($model, 'i_city')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-4">
<?= $form->field($model, 'i_country')->textInput(['maxlength' => true]) ?>
</div>
</div>

<div class="row">
<div class="col-md-4">
<?= $form->field($model, 'vat_number')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-4">
<?= $form->field($model, 'coc_number')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-4">
<?= $form->field($model, 'invoice_email')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-4">
<?= $form->field($model, 'delivery_notes')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-4">
<?= $form->field($model, 'notes')->textInput(['maxlength' => true]) ?>
</div>
</div>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-danger ']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    // JavaScript to populate delivery address fields when checkbox is checked
    document.getElementById('same_as_delivery').addEventListener('change', function() {
        if (this.checked) {
            // If checked, copy invoicing address values to delivery address
            document.getElementById('customer-i_street_name').value = document.getElementById('customer-d_street_name').value;
            document.getElementById('customer-i_house_number').value = document.getElementById('customer-d_house_number').value;
            document.getElementById('customer-i_appendix').value = document.getElementById('customer-d_appendix').value;
            document.getElementById('customer-i_zipcode').value = document.getElementById('customer-d_zipcode').value;
            document.getElementById('customer-i_city').value = document.getElementById('customer-d_city').value;
            document.getElementById('customer-i_country').value = document.getElementById('customer-d_country').value;
        } else {
            // If unchecked, clear the delivery address fields
            document.getElementById('customer-i_street_name').value = '';
            document.getElementById('customer-i_house_number').value = '';
            document.getElementById('customer-i_appendix').value = '';
            document.getElementById('customer-i_zipcode').value = '';
            document.getElementById('customer-i_city').value = '';
            document.getElementById('customer-i_country').value = '';
        }
    });
</script>
