<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Supplier $model */

$this->title = $model->supplier_id;
$this->params['breadcrumbs'][] = ['label' => 'Suppliers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div style="margin-left:380px" class="supplier-view w-50">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'supplier_id' => $model->supplier_id], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Delete', ['delete', 'supplier_id' => $model->supplier_id], [
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
            'supplier_id',
            'company_name',
            'street_name',
            'house_number',
            'appendix',
            'zipcode',
            'city',
            'country',
            'vat_number',
            'coc_number',
            'email:email',
            'notes',
        ],
    ]) ?>

</div>
