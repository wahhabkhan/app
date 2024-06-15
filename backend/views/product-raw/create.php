<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProductRaw $model */

$this->title = 'Create Product Raw';
$this->params['breadcrumbs'][] = ['label' => 'Product Raws', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-raw-create">

    <h3 class="text-danger mt-4" style="margin-left:480px"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
