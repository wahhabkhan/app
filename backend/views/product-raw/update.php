<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProductRaw $model */

$this->title = 'Update Product Raw: ' . $model->product_raw_id;
$this->params['breadcrumbs'][] = ['label' => 'Product Raws', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_raw_id, 'url' => ['view', 'product_raw_id' => $model->product_raw_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-raw-update">

    <h3 class="text-danger mt-4" style="margin-left:470px"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
