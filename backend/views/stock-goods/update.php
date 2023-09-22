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

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
