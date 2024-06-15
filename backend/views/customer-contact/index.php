<?php

use common\models\CustomerContact;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\CustomerContactSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Customer Contacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:180px" class="customer-contact-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Customer Contact', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'contact_id',
            'first_name',
            'last_name',
            'position',
            'email:email',
            //'phone_number1',
            //'phone_number2',
            //'phone_number3',
            //'customer_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CustomerContact $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'contact_id' => $model->contact_id]);
                 }
            ],
        ],
    ]); ?>


</div>
