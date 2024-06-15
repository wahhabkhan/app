<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ProductRaw $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div style="margin-left:480px" class="product-raw-form w-25">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'raw_material_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
