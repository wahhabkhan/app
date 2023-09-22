<?php

namespace backend\controllers;

use common\models\ProductRaw;
use common\models\ProductRawSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductRawController implements the CRUD actions for ProductRaw model.
 */
class ProductRawController extends Controller
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
     * Lists all ProductRaw models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductRawSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductRaw model.
     * @param int $product_raw_id Product Raw ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($product_raw_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($product_raw_id),
        ]);
    }

    /**
     * Creates a new ProductRaw model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ProductRaw();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index', 'product_raw_id' => $model->product_raw_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductRaw model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $product_raw_id Product Raw ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($product_raw_id)
    {
        $model = $this->findModel($product_raw_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index', 'product_raw_id' => $model->product_raw_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductRaw model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $product_raw_id Product Raw ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($product_raw_id)
    {
        $this->findModel($product_raw_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductRaw model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $product_raw_id Product Raw ID
     * @return ProductRaw the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_raw_id)
    {
        if (($model = ProductRaw::findOne(['product_raw_id' => $product_raw_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
