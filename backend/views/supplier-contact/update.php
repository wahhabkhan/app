<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SupplierContact $model */

$this->title = 'Update Supplier Contact: ' . $model->contact_id;
$this->params['breadcrumbs'][] = ['label' => 'Supplier Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->contact_id, 'url' => ['view', 'contact_id' => $model->contact_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="supplier-contact-update">

    <h3 class="text-center text-danger"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
