<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\StockGoods $model */

$this->title = 'Create Stock Goods';
$this->params['breadcrumbs'][] = ['label' => 'Stock Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-goods-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
