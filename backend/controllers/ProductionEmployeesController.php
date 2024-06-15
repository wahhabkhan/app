<?php

namespace backend\controllers;

use common\models\ProductionEmployees;
use common\models\ProductionEmployeesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductionEmployeesController implements the CRUD actions for ProductionEmployees model.
 */
class ProductionEmployeesController extends Controller
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
     * Lists all ProductionEmployees models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductionEmployeesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductionEmployees model.
     * @param int $employees_id Employees ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($employees_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($employees_id),
        ]);
    }

    /**
     * Creates a new ProductionEmployees model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ProductionEmployees();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'employees_id' => $model->employees_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductionEmployees model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $employees_id Employees ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($employees_id)
    {
        $model = $this->findModel($employees_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index', 'employees_id' => $model->employees_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductionEmployees model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $employees_id Employees ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($employees_id)
    {
        $this->findModel($employees_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductionEmployees model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $employees_id Employees ID
     * @return ProductionEmployees the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($employees_id)
    {
        if (($model = ProductionEmployees::findOne(['employees_id' => $employees_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
