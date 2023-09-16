<?php

use common\models\ProductionBatch;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\ProductionBatchSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Production Batches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="production-batch-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Production Batch', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'batch_id',
            'date',
            'production_name',
            'total_units',
            'expiration_date',
            //'batch_number',
            //'raw_material',
            //'employee_name',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProductionBatch $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'batch_id' => $model->batch_id]);
                 }
            ],
        ],
    ]); ?>


</div>
