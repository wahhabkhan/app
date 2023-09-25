<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Product;

/** @var yii\web\View $this */
/** @var common\models\StockGoods $model */
/** @var yii\widgets\ActiveForm $form */
$products = Product::find()->all();
$productList = ArrayHelper::map($products, 'product_id', 'product_name');
?>

<div style="margin-left:380px" class="stock-goods-form mt-4 w-25">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_name')->dropDownList(
        $productList,
        ['prompt' => 'Select Product']
    ) ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
