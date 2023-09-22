<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\StockGoods $model */

$this->title = 'Create Stock of Goods Ready for Sale';
$this->params['breadcrumbs'][] = ['label' => 'Stock Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-goods-create">

    <h1 style="margin-left:180px"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
