<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Sales $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div style="margin-left:180px" class="sales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'total_sales')->textInput() ?>

    <?= $form->field($model, 'total_outstanding')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
