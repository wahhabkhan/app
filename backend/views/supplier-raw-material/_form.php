<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Supplier;
use yii\helpers\ArrayHelper;


/** @var yii\web\View $this */
/** @var common\models\SupplierRawMaterial $model */
/** @var yii\widgets\ActiveForm $form */
$supplierNames = ArrayHelper::map(Supplier::find()->all(), 'supplier_id', 'company_name');
?>

<div style="margin-left:280px" class="supplier-raw-material-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
    <div class="col-md-4">
    <?= $form->field($model, 'raw_material_name')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-4">
    <?= $form->field($model, 'supplier_code')->textInput(['maxlength' => true]) ?>
    </div>

    </div>
    <div class="row">
    <div class="col-md-4">
    <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'low_stock')->textInput(['maxlength' => true]) ?>
    </div>
 </div>
 <div class="row">
 <div class="col-md-4">
    <?= $form->field($model, 'current_stock')->textInput(['maxlength' => true]) ?>
    </div>
 <div class="col-md-4">
    <?= $form->field($model, 'supplier_id')->dropDownList(
        $supplierNames, // The list of supplier names
        ['prompt' => 'Select Supplier'] // Optional, to add a prompt
    ) ?>
    </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
