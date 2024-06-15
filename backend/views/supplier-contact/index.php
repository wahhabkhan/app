<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Supplier Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:180px" class="customer-index">

    <h2 class="text-center text-danger"><?= Html::encode($this->title) ?></h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'contact_id',
            'first_name',
            'last_name',
            'position',
            

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        return ['supplier-contact/view', 'contact_id' => $model->contact_id];
                    }
                    if ($action === 'update') {
                        return ['supplier-contact/update', 'contact_id' => $model->contact_id];
                    }
                    if ($action === 'delete') {
                        return ['supplier-contact/delete', 'contact_id' => $model->contact_id];
                    }
                },
            ],
        ],
    ]); ?>
</div>
