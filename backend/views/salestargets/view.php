<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\SalesTargets $model */

$this->title = $model->target_id;
$this->params['breadcrumbs'][] = ['label' => 'Sales Targets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sales-targets-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'target_id' => $model->target_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'target_id' => $model->target_id], [
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
            'target_id',
            'month_year',
            'sales_target_amount',
            'rep_id',
        ],
    ]) ?>

</div>
