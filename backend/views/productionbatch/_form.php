<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ProductionBatch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="production-batch-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'production_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_units')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'expiration_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'batch_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'raw_material')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
