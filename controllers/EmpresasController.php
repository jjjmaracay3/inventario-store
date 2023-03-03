<?php

namespace app\controllers;

use app\models\InventarioEmpresas;
use app\models\empresasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmpresasController implements the CRUD actions for InventarioEmpresas model.
 */
class EmpresasController extends Controller
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
     * Lists all InventarioEmpresas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new empresasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InventarioEmpresas model.
     * @param int $id_empresa Id Empresa
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_empresa)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_empresa),
        ]);
    }

    /**
     * Creates a new InventarioEmpresas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new InventarioEmpresas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_empresa' => $model->id_empresa]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing InventarioEmpresas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_empresa Id Empresa
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_empresa)
    {
        $model = $this->findModel($id_empresa);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_empresa' => $model->id_empresa]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing InventarioEmpresas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_empresa Id Empresa
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_empresa)
    {
        $this->findModel($id_empresa)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the InventarioEmpresas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_empresa Id Empresa
     * @return InventarioEmpresas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_empresa)
    {
        if (($model = InventarioEmpresas::findOne(['id_empresa' => $id_empresa])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
