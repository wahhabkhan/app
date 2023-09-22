<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\RawMaterialReport $model */

$this->title = 'Create Raw Material Report';
$this->params['breadcrumbs'][] = ['label' => 'Raw Material Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raw-material-report-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
