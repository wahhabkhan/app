<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\ProductionEmployees $model */

$this->title = $model->employees_id;
$this->params['breadcrumbs'][] = ['label' => 'Production Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div style="margin-left:180px" class="production-employees-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'employees_id' => $model->employees_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete', ['delete', 'employees_id' => $model->employees_id], [
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'employees_id',
            'first_name',
            'last_name',
            'phone_number',
            'email:email',
            'street',
            'house_number',
            'appendix',
            'zipcode',
            'city',
        ],
    ]) ?>

</div>
