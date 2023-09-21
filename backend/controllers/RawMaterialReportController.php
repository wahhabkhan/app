<?php

namespace backend\controllers;

use common\models\RawMaterialReport;
use common\models\RawMaterialReportSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RawMaterialReportController implements the CRUD actions for RawMaterialReport model.
 */
class RawMaterialReportController extends Controller
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
     * Lists all RawMaterialReport models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RawMaterialReportSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RawMaterialReport model.
     * @param int $raw_id Raw ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($raw_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($raw_id),
        ]);
    }

    /**
     * Creates a new RawMaterialReport model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RawMaterialReport();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'raw_id' => $model->raw_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RawMaterialReport model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $raw_id Raw ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($raw_id)
    {
        $model = $this->findModel($raw_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'raw_id' => $model->raw_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RawMaterialReport model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $raw_id Raw ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($raw_id)
    {
        $this->findModel($raw_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RawMaterialReport model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $raw_id Raw ID
     * @return RawMaterialReport the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($raw_id)
    {
        if (($model = RawMaterialReport::findOne(['raw_id' => $raw_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
