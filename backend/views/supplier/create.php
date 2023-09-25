<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Supplier $model */

$this->title = 'Add Supplier';
$this->params['breadcrumbs'][] = ['label' => 'Suppliers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-create">

    <h3 class="text-danger text-center" style="margin-left:0px"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
