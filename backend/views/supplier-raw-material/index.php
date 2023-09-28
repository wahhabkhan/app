<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\BootstrapAsset;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Supplier Raw Material';
$this->params['breadcrumbs'][] = $this->title;

// Add Bootstrap Asset Bundle to the view
BootstrapAsset::register($this);

// Define a JavaScript function to open the email client
$js = <<<JS
function sendOrderEmail(rawMaterialName, supplierName, unit) {
    var emailBody = 'Order Details:\\n\\nRaw Material: ' + rawMaterialName + '\\nSupplier: ' + supplierName + '\\nUnit: ' + unit;
    var emailSubject = 'Order for ' + rawMaterialName;
    window.open('mailto:?subject=' + encodeURIComponent(emailSubject) + '&body=' + encodeURIComponent(emailBody));
}
JS;
$this->registerJs($js, \yii\web\View::POS_END); // Ensure the script is loaded at the end of the page
?>

<div style="margin-left:180px" class="supplier-raw-index">
    <h2 class="text-center text-danger mt-2"><?= Html::encode($this->title) ?></h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'raw_material_name',
            'unit',
            'low_stock',
            'current_stock',
            [
                'attribute' => 'supplier_id',
                'label' => 'Supplier',
                'value' => function ($model) {
                    return $model->supplierName;
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {order}', // Add the 'order' template
                'buttons' => [
                    'order' => function ($url, $model, $key) {
                        return Html::a(
                            'Order', // Change the button label to "Order"
                            'javascript:void(0);', // JavaScript function will be attached here
                            [
                                'title' => 'Order',
                                'onclick' => 'sendOrderEmail("' . $model->raw_material_name . '", "' . $model->supplierName . '", "' . $model->unit . '"); return false;', // Prevent the default link behavior
                            ]
                        );
                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        return ['supplier-raw-material/view', 'raw_id' => $model->raw_id];
                    }
                    if ($action === 'update') {
                        return ['supplier-raw-material/update', 'raw_id' => $model->raw_id];
                    }
                    if ($action === 'delete') {
                        return ['supplier-raw-material/delete', 'raw_id' => $model->raw_id];
                    }
                },
            ],
        ],
    ]); ?>
</div>
