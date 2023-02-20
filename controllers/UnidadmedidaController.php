<?php

namespace app\controllers;

use app\models\Unidadmedida;
use app\models\unidadmedidaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UnidadmedidaController implements the CRUD actions for Unidadmedida model.
 */
class UnidadmedidaController extends Controller
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
     * Lists all Unidadmedida models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new unidadmedidaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Unidadmedida model.
     * @param int $idunidadmedida Idunidadmedida
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idunidadmedida)
    {
        return $this->render('view', [
            'model' => $this->findModel($idunidadmedida),
        ]);
    }

    /**
     * Creates a new Unidadmedida model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Unidadmedida();

        if ($this->request->isPost) {
            $model->fechareg=new CDbExpression('NOW()');
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idunidadmedida' => $model->idunidadmedida]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Unidadmedida model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idunidadmedida Idunidadmedida
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idunidadmedida)
    {
        $model = $this->findModel($idunidadmedida);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idunidadmedida' => $model->idunidadmedida]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Unidadmedida model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idunidadmedida Idunidadmedida
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idunidadmedida)
    {
        $this->findModel($idunidadmedida)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Unidadmedida model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idunidadmedida Idunidadmedida
     * @return Unidadmedida the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idunidadmedida)
    {
        if (($model = Unidadmedida::findOne(['idunidadmedida' => $idunidadmedida])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
