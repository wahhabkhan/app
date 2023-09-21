<?php

namespace backend\controllers;

use common\models\SalesTargets;
use common\models\SalesTargetsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SalesTargetsController implements the CRUD actions for SalesTargets model.
 */
class SalesTargetsController extends Controller
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
     * Lists all SalesTargets models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SalesTargetsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SalesTargets model.
     * @param int $target_id Target ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($target_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($target_id),
        ]);
    }

    /**
     * Creates a new SalesTargets model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new SalesTargets();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'target_id' => $model->target_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SalesTargets model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $target_id Target ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($target_id)
    {
        $model = $this->findModel($target_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'target_id' => $model->target_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SalesTargets model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $target_id Target ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($target_id)
    {
        $this->findModel($target_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SalesTargets model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $target_id Target ID
     * @return SalesTargets the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($target_id)
    {
        if (($model = SalesTargets::findOne(['target_id' => $target_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
