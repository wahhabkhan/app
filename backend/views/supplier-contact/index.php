<?php

use common\models\SupplierContact;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\SupplierContactSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Supplier Contacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:180px" class="supplier-contact-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Supplier Contact', ['create'], ['class' => 'btn btn-success']) ?>
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
            //'supplier_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, SupplierContact $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'contact_id' => $model->contact_id]);
                 }
            ],
        ],
    ]); ?>


</div>
