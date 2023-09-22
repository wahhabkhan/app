<?php

use common\models\SupplierRawMaterial;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\SupplierRawMaterialSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Supplier Raw Materials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:180px" class="supplier-raw-material-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Supplier Raw Material', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'raw_id',
            'raw_material_name',
            'supplier_code',
            'unit',
            'low_stock',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, SupplierRawMaterial $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'raw_id' => $model->raw_id]);
                 }
            ],
        ],
    ]); ?>


</div>
