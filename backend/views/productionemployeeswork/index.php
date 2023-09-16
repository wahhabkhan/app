<?php

use common\models\ProductionEmployeesWork;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\ProductionEmployeesWorkSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Production Employees Works';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="production-employees-work-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Production Employees Work', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'work_id',
            'date',
            'working_hours',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProductionEmployeesWork $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'work_id' => $model->work_id]);
                 }
            ],
        ],
    ]); ?>


</div>
