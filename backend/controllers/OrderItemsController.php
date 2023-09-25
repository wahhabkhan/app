<?php

namespace backend\controllers;
use common\models\Order;
use common\models\Customer;
use common\models\OrderItems;
use common\models\OrderItemsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
    public function actionCreate($customer_id = null)
{
    // Check if a customer_id is provided, if not, set it to null
    if ($customer_id === null) {
        $customer = null;
    } else {
        $customer = Customer::findOne($customer_id);

        if (!$customer) {
            throw new NotFoundHttpException('Customer not found.');
        }
    }

    // Create an Order record
    $order = new Order();
    $order->customer_id = $customer_id; // Set customer_id (can be null for random customers)
    $order->invoice_number = $this->generateInvoiceNumber(); // Generate a random invoice number
    $order->date = date('Y-m-d H:i:s'); // Set the current date and time

    // If a customer is provided, set the order attributes from the customer
    if ($customer) {
        $order->company_name = $customer->company_name;
        $order->street_name = $customer->i_street_name;
        $order->house_number = $customer->i_house_number;
        $order->appendix = $customer->i_appendix;
        $order->zipcode = $customer->i_zipcode;
        $order->city = $customer->i_city;
        $order->country = $customer->i_country;
        $order->vat_number = $customer->vat_number;
    }

    // Save the order record first
    if ($order->save()) {
        $orderItem = new OrderItems();
        $orderItem->customer_id = $customer_id; // Set customer_id (can be null for random customers)
        $orderItem->order_id = $order->order_id; // Associate the order item with the newly created order

        if ($this->request->isPost) {
            if ($orderItem->load($this->request->post()) && $orderItem->save()) {
                // Redirect to the order items index page after successful order item creation
                return $this->redirect(['index']);
            }
        } else {
            $orderItem->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $orderItem,
            'customer' => $customer,
        ]);
    } else {
        Yii::error('Failed to save order: ' . var_export($order->errors, true));
        throw new \yii\web\HttpException(500, 'Internal Server Error');
    }
}

    
    
    
    private function generateInvoiceNumber()
    {
        // Generate a unique invoice number based on your requirements
        // You can use your own logic to generate the invoice number here
        // For example, you can generate a random number or use a specific format
        return rand(1000000000, 9999999999); // Generates a random 10-digit number
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

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'order_items_id' => $model->order_items_id]);
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
