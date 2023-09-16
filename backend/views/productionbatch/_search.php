<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ProductionBatchSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="production-batch-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'batch_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'production_name') ?>

    <?= $form->field($model, 'total_units') ?>

    <?= $form->field($model, 'expiration_date') ?>

    <?php // echo $form->field($model, 'batch_number') ?>

    <?php // echo $form->field($model, 'raw_material') ?>

    <?php // echo $form->field($model, 'employee_name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
