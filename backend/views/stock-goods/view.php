<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\StockGoods $model */

$this->title = $model->stock_id;
$this->params['breadcrumbs'][] = ['label' => 'Stock Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div style="margin-left:180px" class="stock-goods-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'stock_id' => $model->stock_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete', ['delete', 'stock_id' => $model->stock_id], [
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'stock_id',
            'product_name',
            'count',
        ],
    ]) ?>

</div>
