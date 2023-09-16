<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\SalesTargetsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sales-targets-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'target_id') ?>

    <?= $form->field($model, 'month_year') ?>

    <?= $form->field($model, 'sales_target_amount') ?>

    <?= $form->field($model, 'rep_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
