<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\StockGoods $model */

$this->title = 'Update Stock Goods: ' . $model->stock_id;
$this->params['breadcrumbs'][] = ['label' => 'Stock Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stock_id, 'url' => ['view', 'stock_id' => $model->stock_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stock-goods-update">

    <h3 class=" text-danger mt-4" style="margin-left:380px"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
