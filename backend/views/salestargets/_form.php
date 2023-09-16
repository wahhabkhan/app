<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\SalesTargets $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sales-targets-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'month_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sales_target_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rep_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
