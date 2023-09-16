<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\DeliveryRawMaterial $model */

$this->title = 'Create Delivery Raw Material';
$this->params['breadcrumbs'][] = ['label' => 'Delivery Raw Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-raw-material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
