<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\ProductRaw $model */

$this->title = $model->product_raw_id;
$this->params['breadcrumbs'][] = ['label' => 'Product Raws', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div style="margin-left:380px" class="product-raw-view w-50">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'product_raw_id' => $model->product_raw_id], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Delete', ['delete', 'product_raw_id' => $model->product_raw_id], [
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
            'product_raw_id',
            'raw_material_name',
            'unit',
            'weight',
        ],
    ]) ?>

</div>
