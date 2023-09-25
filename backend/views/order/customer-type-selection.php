<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'Choose Customer:';
$this->params['breadcrumbs'][] = $this->title;
?>

<div style="margin-left:450px" class="order-form mt-5">
    <h2 class="ms-4"><?= Html::encode($this->title) ?></h2>

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::a('Random Customer', ['order/create'], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Existing Customer', ['order/existing-customers'], ['class' => ' ms-3 btn btn-danger']) ?>

    <?php ActiveForm::end(); ?>
</div>
