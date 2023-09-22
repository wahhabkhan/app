<?php

use common\models\Manager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\ManagerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Managers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:180px" class="manager-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Manager', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'manager_id',
            'first_name',
            'last_name',
            'email:email',
            'phone',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Manager $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'manager_id' => $model->manager_id]);
                 }
            ],
        ],
    ]); ?>


</div>
