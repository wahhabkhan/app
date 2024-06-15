<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
/** @var yii\web\View $this */
/** @var common\models\DeliveryRawMaterial $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div style="margin-left:180px" class="delivery-raw-material-form w-75">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row ">
        <div class="col-md-4">

    <?= $form->field($model, 'supplier_company_name')->dropDownList(
    \yii\helpers\ArrayHelper::map(\common\models\Supplier::find()->all(), 'company_name', 'company_name'),
    ['prompt' => 'Select Supplier']
) ?>
</div>
<div class="col-md-4">

<?= $form->field($model, 'raw_material_name')->dropDownList(
    \yii\helpers\ArrayHelper::map(\common\models\SupplierRawMaterial::find()->all(), 'raw_material_name', 'raw_material_name'),
    ['prompt' => 'Select Raw Material']
) ?>
</div>


<div class="col-md-4">
    <?= $form->field($model, 'date')->textInput() ?>
    </div>
    </div>

    <div class="col-md-4">
    <?= $form->field($model, 'is_packaging_ok')->radioList(['1' => 'Yes', '0' => 'No']) ?>
    </div>

    <div class="row">

    <div class="col-md-4">
    <?= $form->field($model, 'batch_no')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'expiration_date')->widget(DatePicker::classname(), [
    'options' => ['class' => 'form-control'],
    'dateFormat' => 'yyyy-MM-dd', 
]) ?>
  </div>
  <div class="col-md-4">
  <?= $form->field($model, 'unit')->textInput() ?>
  </div>
  </div>

  <div class="row">
  <div class="col-md-4">

    <?= $form->field($model, 'total_units')->textInput() ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'price_per_unit')->textInput() ?>
    </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
