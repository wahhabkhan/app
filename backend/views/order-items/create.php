<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\OrderItems $model */

$this->title = 'Add Order Items';
$this->params['breadcrumbs'][] = ['label' => 'Order Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-items-create ms-5 mt-3">

    <h3 class="text-danger" style="margin-left:300px"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'order_id' => $order_id, // Pass the $order_id variable to the view
    ]) ?>

</div>
