<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ProductionEmployeesWorkSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="production-employees-work-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'work_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'working_hours') ?>

    <?= $form->field($model, 'production_employees_employees_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
