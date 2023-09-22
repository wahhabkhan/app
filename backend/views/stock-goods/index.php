<?php

use common\models\StockGoods;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\StockGoodsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Stock Goods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:180px" class="stock-goods-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Stock Goods', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'stock_id',
            'product_name',
            'count',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, StockGoods $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'stock_id' => $model->stock_id]);
                 }
            ],
        ],
    ]); ?>


</div>
