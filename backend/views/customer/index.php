<?php

use common\models\Customer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\CustomerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'customer_id',
            'company_name',
            'i_street_name',
            'i_house_number',
            'i_appendix',
            //'i_zipcode',
            //'i_city',
            //'i_country',
            //'d_street_name',
            //'d_house_number',
            //'d_appendix',
            //'d_zipcode',
            //'d_city',
            //'d_country',
            //'vat_number',
            //'coc_number',
            //'invoice_email:email',
            //'delivery_notes',
            //'notes',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Customer $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'customer_id' => $model->customer_id]);
                 }
            ],
        ],
    ]); ?>


</div>
