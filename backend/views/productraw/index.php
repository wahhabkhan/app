<?php

use common\models\ProductRaw;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\ProductRawSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Product Raws';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-raw-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product Raw', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'product_raw_id',
            'raw_material_name',
            'unit',
            'weight',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProductRaw $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'product_raw_id' => $model->product_raw_id]);
                 }
            ],
        ],
    ]); ?>


</div>
