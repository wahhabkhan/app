<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CustomerContact $model */

$this->title = 'Update Customer Contact: ' . $model->contact_id;
$this->params['breadcrumbs'][] = ['label' => 'Customer Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->contact_id, 'url' => ['view', 'contact_id' => $model->contact_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-contact-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
