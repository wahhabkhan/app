<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Order;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\OrderItems $model */
/** @var yii\widgets\ActiveForm $form */
$order = ArrayHelper::map(Order::find()->all(), 'order_id', function($model) {
    return $model->order_id . '  ,  ' . $model->date . '  ,   ' . $model->invoice_number;
});
// <?= $form->field($model, 'order_id')->dropDownList(
//     \yii\helpers\ArrayHelper::map(\common\models\Order::find()->all(), 'order_id', 'order_id'),
//     ['prompt' => 'Select Order']
// ) 
?>

<div style="margin-left:180px" class="order-items-form w-50">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row ">
    <div class="col-md-6">

    <?= $form->field($model, 'order_id')->dropDownList(
        $order, // The list of employee names
        ['prompt' => 'Select Order Info'] // Optional, to add a prompt
    ) ?>
    </div>

    <div class="row ">
    <div class="col-md-6">
    <?= $form->field($model, 'product')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'var_rate')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    <div class="row ">
    <div class="col-md-6">

    <?= $form->field($model, 'quantity')->textInput() ?>
    
    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'unit_price')->textInput(['maxlength' => true]) ?>
    </div>

    </div>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
