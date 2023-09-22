<?php

use common\models\Sales;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\SalesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Sales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:180px" class="sales-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sales', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sales_id',
            'total_sales',
            'total_outstanding',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Sales $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'sales_id' => $model->sales_id]);
                 }
            ],
        ],
    ]); ?>


</div>
