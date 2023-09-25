<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\OrderItems $model */

$this->title = 'Update Order Items: ' . $model->order_items_id;
$this->params['breadcrumbs'][] = ['label' => 'Order Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->order_items_id, 'url' => ['view', 'order_items_id' => $model->order_items_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-items-update ms-5 mt-4">

    <h3 style="margin-left:280px" class="text-danger"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
