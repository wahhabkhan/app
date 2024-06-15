<?php

namespace backend\controllers;

use common\models\ProductionBatch;
use common\models\ProductionBatchSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductionBatchController implements the CRUD actions for ProductionBatch model.
 */
class ProductionBatchController extends Controller
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
     * Lists all ProductionBatch models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductionBatchSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductionBatch model.
     * @param int $batch_id Batch ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($batch_id)
    {
        
        return $this->render('view', [
            'model' => $this->findModel($batch_id),
        ]);
    }

    /**
     * Creates a new ProductionBatch model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ProductionBatch();
        
        $model->date = date('Y-m-d');

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'batch_id' => $model->batch_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductionBatch model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $batch_id Batch ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($batch_id)
    {
        $model = $this->findModel($batch_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'batch_id' => $model->batch_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductionBatch model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $batch_id Batch ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($batch_id)
    {
        $this->findModel($batch_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductionBatch model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $batch_id Batch ID
     * @return ProductionBatch the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($batch_id)
    {
        if (($model = ProductionBatch::findOne(['batch_id' => $batch_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
