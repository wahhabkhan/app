<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\DeliveryRawMaterial $model */

$this->title = 'Update Delivery Raw Material: ' . $model->delivery_raw_id;
$this->params['breadcrumbs'][] = ['label' => 'Delivery Raw Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->delivery_raw_id, 'url' => ['view', 'delivery_raw_id' => $model->delivery_raw_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="delivery-raw-material-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
