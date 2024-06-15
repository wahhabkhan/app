<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\CustomerSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'company_name') ?>

    <?= $form->field($model, 'i_street_name') ?>

    <?= $form->field($model, 'i_house_number') ?>

    <?= $form->field($model, 'i_appendix') ?>

    <?php // echo $form->field($model, 'i_zipcode') ?>

    <?php // echo $form->field($model, 'i_city') ?>

    <?php // echo $form->field($model, 'i_country') ?>

    <?php // echo $form->field($model, 'd_street_name') ?>

    <?php // echo $form->field($model, 'd_house_number') ?>

    <?php // echo $form->field($model, 'd_appendix') ?>

    <?php // echo $form->field($model, 'd_zipcode') ?>

    <?php // echo $form->field($model, 'd_city') ?>

    <?php // echo $form->field($model, 'd_country') ?>

    <?php // echo $form->field($model, 'vat_number') ?>

    <?php // echo $form->field($model, 'coc_number') ?>

    <?php // echo $form->field($model, 'invoice_email') ?>

    <?php // echo $form->field($model, 'delivery_notes') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
