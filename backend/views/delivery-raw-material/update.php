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

    <h3 class="text-danger mt-3" style="margin-left:380px"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
