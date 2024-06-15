<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'Choose Customer:';
$this->params['breadcrumbs'][] = $this->title;
?>

<div style="margin-left:450px" class="order-form mt-5">
    <h3  class="ms-4 text-secondary"><?= Html::encode($this->title) ?></h3 >

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::a('Existing Customers', ['order/existing-customers'], ['class' => 'btn btn-primary ms-5 mt-2']) ?> <br>
        <?= Html::a('Random Customer', ['order/create-random'], ['class' => 'btn btn-danger ms-5 mt-2']) ?>

    <?php ActiveForm::end(); ?>
</div>
