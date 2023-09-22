<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\DeliveryRawMaterial $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div style="margin-left:180px" class="delivery-raw-material-form w-75">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'supplier_company_name')->dropDownList(
    \yii\helpers\ArrayHelper::map(\common\models\Supplier::find()->all(), 'company_name', 'company_name'),
    ['prompt' => 'Select Supplier']
) ?>

<?= $form->field($model, 'raw_material_name')->dropDownList(
    \yii\helpers\ArrayHelper::map(\common\models\SupplierRawMaterial::find()->all(), 'raw_material_name', 'raw_material_name'),
    ['prompt' => 'Select Raw Material']
) ?>


    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'is_packaging_ok')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'batch_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'expiration_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit')->textInput() ?>

    <?= $form->field($model, 'total_units')->textInput() ?>

    <?= $form->field($model, 'price_per_unit')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
