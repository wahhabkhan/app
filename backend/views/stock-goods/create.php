<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\StockGoods $model */

$this->title = 'Add Stock of Goods Ready for Sale';
$this->params['breadcrumbs'][] = ['label' => 'Stock Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-goods-create mt-4">

    <h2 class="text-danger" style="margin-left:380px"><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
