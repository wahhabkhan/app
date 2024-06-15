<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\SupplierContact $model */

$this->title = $model->contact_id;
$this->params['breadcrumbs'][] = ['label' => 'Supplier Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div style="margin-left:380px" class="supplier-contact-view w-50">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'contact_id' => $model->contact_id], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Delete', ['delete', 'contact_id' => $model->contact_id], [
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
            'contact_id',
            'first_name',
            'last_name',
            'position',
            'email:email',
            'phone_number1',
            'phone_number2',
            'phone_number3',
            //'supplier_id',
        ],
    ]) ?>

</div>
