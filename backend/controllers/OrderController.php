<?php

namespace backend\controllers;

use common\models\Order;
use common\models\Customer;
use common\models\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
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
     * Lists all Order models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param int $order_id Order ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($order_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($order_id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreateRandom()
    {
        // Create a new order
        $order = new Order();
    
        // Handle the case of a random customer
        $order->customer_id = null;
        // Set other order attributes as needed
        $order->invoice_number = $this->generateInvoiceNumber();
        $order->date = date('Y-m-d H:i:s');
    
        // If it's a POST request, validate and save the order
        if ($order->load(Yii::$app->request->post()) && $order->save()) {
            // Redirect to the order items create action with the new order_id
            return $this->redirect(['/order-items/create', 'order_id' => $order->order_id]);
        }
    
        // Render the order creation form for random customers
        return $this->render('create', [
            'model' => $order,
        ]);
    }
    
    public function actionCreate($customer_id = null)
    {
        if ($customer_id !== null) {
            // Try to find an existing customer
            $customer = Customer::findOne($customer_id);
    
            if ($customer) {
                // Populate order attributes from the customer
                $order = new Order();

                $order->invoice_number = $this->generateInvoiceNumber();
                $order->date = date('Y-m-d H:i:s');

                $order->customer_id = $customer_id;
                $order->company_name = $customer->company_name;
                $order->street_name = $customer->i_street_name;
                $order->house_number = $customer->i_house_number;
                $order->appendix = $customer->i_appendix;
                $order->zipcode = $customer->i_zipcode;
                $order->city = $customer->i_city;
                $order->country = $customer->i_country;
                $order->vat_number = $customer->vat_number;
    
                // Save the order and redirect to order items create action
                if ($order->save()) {
                    return $this->redirect(['/order-items/create', 'order_id' => $order->order_id]);
                }
            } else {
                // Handle the case where the provided customer ID does not exist
                throw new NotFoundHttpException('Customer not found.');
            }
        }
    
        // Render the existing customer view for creating orders
        $customers = Customer::find()->all();
        return $this->render('existing-customers', ['customers' => $customers]);
    }
    
    
    
    
    
    
    private function generateInvoiceNumber()
    {
        $existingNumbers = Order::find()->select('invoice_number')->column(); // Retrieve existing numbers

        do {
            $randomNumber = mt_rand(1000000000, 9999999999); // Generate a random number (adjust the range as needed)
         //   $invoiceNumber = 'INV-' . $randomNumber; // Format the invoice number as needed
        } while (in_array($randomNumber, $existingNumbers)); // Check for duplicates
        return $randomNumber;    
    }

    public function actionCustomerTypeSelection()
    {
        return $this->render('customer-type-selection');
    }

public function actionExistingCustomers()
{
    $customers = Customer::find()->all();
    return $this->render('existing-customers', ['customers' => $customers]);
}
    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $order_id Order ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($order_id)
    {
        $model = $this->findModel($order_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'order_id' => $model->order_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $order_id Order ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($order_id)
    {
        $this->findModel($order_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $order_id Order ID
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($order_id)
    {
        if (($model = Order::findOne(['order_id' => $order_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
