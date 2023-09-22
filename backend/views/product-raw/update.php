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

    <h1 style="margin-left:180px"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
