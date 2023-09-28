<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\SupplierRawMaterial $model */

$this->title = $model->raw_id;
$this->params['breadcrumbs'][] = ['label' => 'Supplier Raw Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div style="margin-left:380px"  class="supplier-raw-material-view w-50">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'raw_id' => $model->raw_id], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Delete', ['delete', 'raw_id' => $model->raw_id], [
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
            'raw_id',
            'raw_material_name',
            'supplier_code',
            'unit',
            'low_stock',
            'current_stock',
            [
                'label' => 'Supplier',
                'value' => $model->supplierName,
            ],
        ],
    ]) ?>

</div>
