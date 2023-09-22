<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Customer $model */

$this->title = 'Create Customer';
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div  class="customer-create">

    <h1 class="text-center" style="margin-left:180px"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
