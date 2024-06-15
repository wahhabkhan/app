<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div style="margin-left:180px" class="product-form w-75">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row ">
        <div class="col-md-4">

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-4">
    <?= $form->field($model, 'barcode')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'volume_or_weight')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    <div class="row ">
        <div class="col-md-4">
    <?= $form->field($model, 'retial_price')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'wholesale_price')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
