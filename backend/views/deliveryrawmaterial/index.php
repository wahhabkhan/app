<?php

use common\models\DeliveryRawMaterial;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\DeliveryRawMaterialSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Delivery Raw Materials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:180px" class="delivery-raw-material-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Delivery Raw Material', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'delivery_raw_id',
            'supplier_company_name',
            'raw_material_name',
            'date',
            'is_packaging_ok',
            //'batch_no',
            //'expiration_date',
            //'unit',
            //'total_units',
            //'price_per_unit',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, DeliveryRawMaterial $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'delivery_raw_id' => $model->delivery_raw_id]);
                 }
            ],
        ],
    ]); ?>


</div>
