<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Manager $model */

$this->title = 'Update Manager: ' . $model->manager_id;
$this->params['breadcrumbs'][] = ['label' => 'Managers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->manager_id, 'url' => ['view', 'manager_id' => $model->manager_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="manager-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
