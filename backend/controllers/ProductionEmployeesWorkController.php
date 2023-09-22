<?php

namespace backend\controllers;

use common\models\ProductionEmployeesWork;
use common\models\ProductionEmployeesWorkSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductionEmployeesWorkController implements the CRUD actions for ProductionEmployeesWork model.
 */
class ProductionEmployeesWorkController extends Controller
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
     * Lists all ProductionEmployeesWork models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductionEmployeesWorkSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductionEmployeesWork model.
     * @param int $work_id Work ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($work_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($work_id),
        ]);
    }

    /**
     * Creates a new ProductionEmployeesWork model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ProductionEmployeesWork();

        if ($this->request->isPost) {
           
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'work_id' => $model->work_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductionEmployeesWork model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $work_id Work ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($work_id)
    {
        $model = $this->findModel($work_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index', 'work_id' => $model->work_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductionEmployeesWork model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $work_id Work ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($work_id)
    {
        $this->findModel($work_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductionEmployeesWork model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $work_id Work ID
     * @return ProductionEmployeesWork the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($work_id)
    {
        if (($model = ProductionEmployeesWork::findOne(['work_id' => $work_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
