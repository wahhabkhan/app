<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\CustomerContact $model */

$this->title = $model->contact_id;
$this->params['breadcrumbs'][] = ['label' => 'Customer Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div style="margin-left:180px" class="customer-contact-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'contact_id' => $model->contact_id], ['class' => 'btn btn-primary']) ?>
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
            'customer_id',
        ],
    ]) ?>

</div>
