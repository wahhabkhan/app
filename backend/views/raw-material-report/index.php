<?php

use common\models\RawMaterialReport;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\RawMaterialReportSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Raw Material Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:180px" class="raw-material-report-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Raw Material Report', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'raw_id',
            'start_date',
            'end_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RawMaterialReport $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'raw_id' => $model->raw_id]);
                 }
            ],
        ],
    ]); ?>


</div>
