<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SupplierContact $model */

$this->title = 'Add Supplier Contact';
$this->params['breadcrumbs'][] = ['label' => 'Supplier Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-contact-create">

    <h3 class="text-danger" style="margin-left:400px"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
