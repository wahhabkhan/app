<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\DeliveryRawMaterial $model */

$this->title = 'Create Delivery of a Raw Material';
$this->params['breadcrumbs'][] = ['label' => 'Delivery Raw Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-raw-material-create">

    <h1 style="margin-left:180px"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
