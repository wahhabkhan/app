<?php

namespace backend\controllers;
use common\models\Order;
use common\models\Customer;
use common\models\OrderItems;
use common\models\OrderItemsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//use kartik\mpdf\Pdf;
use yii\data\ActiveDataProvider;
use TCPDF;
use Yii;


/**
 * OrderItemsController implements the CRUD actions for OrderItems model.
 */
class OrderItemsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all OrderItems models.
     *
     * @return string
     */
    public function actionIndex($order_id)
    {
        $searchModel = new OrderItemsSearch();
        $searchModel->order_id = $order_id; // Ensure that you set the order_id
        $dataProvider = $searchModel->search($this->request->queryParams);
    
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'order_id' => $order_id,
        ]);
    }
    

    /**
     * Displays a single OrderItems model.
     * @param int $order_items_id Order Items ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($order_items_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($order_items_id),
        ]);
    }

    /**
     * Creates a new OrderItems model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($order_id)
    {
        $order = Order::findOne($order_id);
    
        if (!$order) {
            throw new NotFoundHttpException('Order not found.');
        }
    
        $model = new OrderItems();
        $model->order_id = $order_id;
    
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                // Redirect to the order items index page after successful order item creation
                return $this->redirect(['index', 'order_id' => $order_id]);
            }
        } else {
            $model->loadDefaultValues();
        }
    
        return $this->render('create', [
            'model' => $model,
            'order' => $order,
            'order_id' => $order_id,
        ]);
    }
    public function actionGeneratePdf($order_id)
    {
        $orderModel = Order::findOne($order_id);
        $dataProvider = new ActiveDataProvider([
            'query' => OrderItems::find()->where(['order_id' => $order_id]),
        ]);

        // Create a new TCPDF instance
        $pdf = new TCPDF();

        // Set document information
        $pdf->SetCreator(Yii::$app->name);
        $pdf->SetAuthor(Yii::$app->name);
        $pdf->SetTitle('Order PDF');
        $pdf->SetSubject('Order PDF');
        $pdf->SetKeywords('order, pdf');

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('dejavusans', '', 12);

        // Output content to PDF
        $content = $this->renderPartial('pdf-view', [
            'orderModel' => $orderModel,
            'dataProvider' => $dataProvider,
        ]);
        $pdf->writeHTML($content, true, false, true, false, '');

        // Close and output PDF
        $pdf->Output('order.pdf', 'I');
    }

    
    
    /**
     * Updates an existing OrderItems model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $order_items_id Order Items ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($order_items_id)
    {
        $model = $this->findModel($order_items_id);
        $order_id = $model->order_id; // Get the order_id from the model
    
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index', 'order_id' => $order_id]); // Redirect to the index page with order_id
        }
    
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    

    /**
     * Deletes an existing OrderItems model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $order_items_id Order Items ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($order_items_id)
    {
        $this->findModel($order_items_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OrderItems model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $order_items_id Order Items ID
     * @return OrderItems the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($order_items_id)
    {
        if (($model = OrderItems::findOne(['order_items_id' => $order_items_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
