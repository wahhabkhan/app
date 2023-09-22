<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\RawMaterialReport $model */

$this->title = $model->raw_id;
$this->params['breadcrumbs'][] = ['label' => 'Raw Material Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div style="margin-left:180px" class="raw-material-report-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'raw_id' => $model->raw_id], ['class' => 'btn btn-primary']) ?>
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
            'start_date',
            'end_date',
        ],
    ]) ?>

</div>
