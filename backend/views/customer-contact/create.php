<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CustomerContact $model */

$this->title = 'Create Customer Contact';
$this->params['breadcrumbs'][] = ['label' => 'Customer Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div  class="customer-contact-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
