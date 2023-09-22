<?php

namespace backend\controllers;

use common\models\DeliveryRawMaterial;
use common\models\DeliveryRawMaterialSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DeliveryRawMaterialController implements the CRUD actions for DeliveryRawMaterial model.
 */
class DeliveryRawMaterialController extends Controller
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
     * Lists all DeliveryRawMaterial models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DeliveryRawMaterialSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DeliveryRawMaterial model.
     * @param int $delivery_raw_id Delivery Raw ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($delivery_raw_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($delivery_raw_id),
        ]);
    }

    /**
     * Creates a new DeliveryRawMaterial model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new DeliveryRawMaterial();

        $model->date = date('Y-m-d');

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'delivery_raw_id' => $model->delivery_raw_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DeliveryRawMaterial model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $delivery_raw_id Delivery Raw ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($delivery_raw_id)
    {
        $model = $this->findModel($delivery_raw_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'delivery_raw_id' => $model->delivery_raw_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DeliveryRawMaterial model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $delivery_raw_id Delivery Raw ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($delivery_raw_id)
    {
        $this->findModel($delivery_raw_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DeliveryRawMaterial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $delivery_raw_id Delivery Raw ID
     * @return DeliveryRawMaterial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($delivery_raw_id)
    {
        if (($model = DeliveryRawMaterial::findOne(['delivery_raw_id' => $delivery_raw_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
