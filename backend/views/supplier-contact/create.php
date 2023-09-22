<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SupplierContact $model */

$this->title = 'Create Supplier Contact';
$this->params['breadcrumbs'][] = ['label' => 'Supplier Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-contact-create">

    <h1 style="margin-left:180px"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
