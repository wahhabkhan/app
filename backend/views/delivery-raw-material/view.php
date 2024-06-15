<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\DeliveryRawMaterial $model */

$this->title = $model->delivery_raw_id;
$this->params['breadcrumbs'][] = ['label' => 'Delivery Raw Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div style="margin-left:380px" class="delivery-raw-material-view w-50">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'delivery_raw_id' => $model->delivery_raw_id], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Delete', ['delete', 'delivery_raw_id' => $model->delivery_raw_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'delivery_raw_id',
            'supplier_company_name',
            'raw_material_name',
            'date',
            'is_packaging_ok',
            'batch_no',
            'expiration_date',
            'unit',
            'total_units',
            'price_per_unit',
        ],
    ]) ?>

</div>
