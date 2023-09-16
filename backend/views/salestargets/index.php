<?php

use common\models\SalesTargets;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\SalesTargetsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Sales Targets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-targets-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sales Targets', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'target_id',
            'month_year',
            'sales_target_amount',
            'rep_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, SalesTargets $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'target_id' => $model->target_id]);
                 }
            ],
        ],
    ]); ?>


</div>
