<?php

namespace backend\controllers;

use common\models\SupplierRawMaterial;
use common\models\SupplierRawMaterialSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SupplierRawMaterialController implements the CRUD actions for SupplierRawMaterial model.
 */
class SupplierRawMaterialController extends Controller
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
     * Lists all SupplierRawMaterial models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SupplierRawMaterialSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SupplierRawMaterial model.
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
     * Creates a new SupplierRawMaterial model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new SupplierRawMaterial();

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
     * Updates an existing SupplierRawMaterial model.
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
     * Deletes an existing SupplierRawMaterial model.
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
     * Finds the SupplierRawMaterial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $raw_id Raw ID
     * @return SupplierRawMaterial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($raw_id)
    {
        if (($model = SupplierRawMaterial::findOne(['raw_id' => $raw_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
