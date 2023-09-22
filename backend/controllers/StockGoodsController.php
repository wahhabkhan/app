<?php

namespace backend\controllers;

use common\models\StockGoods;
use common\models\StockGoodsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StockGoodsController implements the CRUD actions for StockGoods model.
 */
class StockGoodsController extends Controller
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
     * Lists all StockGoods models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StockGoodsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StockGoods model.
     * @param int $stock_id Stock ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($stock_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($stock_id),
        ]);
    }

    /**
     * Creates a new StockGoods model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new StockGoods();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'stock_id' => $model->stock_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing StockGoods model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $stock_id Stock ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($stock_id)
    {
        $model = $this->findModel($stock_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'stock_id' => $model->stock_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing StockGoods model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $stock_id Stock ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($stock_id)
    {
        $this->findModel($stock_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StockGoods model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $stock_id Stock ID
     * @return StockGoods the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($stock_id)
    {
        if (($model = StockGoods::findOne(['stock_id' => $stock_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
