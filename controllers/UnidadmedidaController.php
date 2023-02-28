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
        $dataProvider->query->where('estatus = true'); //Mostrar solo los registros activos

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Unidadmedida model.
     * @param int $id_unidadmedida Id Unidadmedida
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_unidadmedida)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_unidadmedida),
        ]);
    }

    /**
     * Creates a new Unidadmedida model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    /*public function actionCreate()
    {
        $model = new Unidadmedida();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_unidadmedida' => $model->id_unidadmedida]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }*/


    public function actionCreate()
    {
        $model = new Unidadmedida();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
              /*Valores que no se registran por formulario pero que se deben guardar en BD en conjunto con los del formulario*/
              $_POST['Unidadmedida']['usuario']=(int)1;
              $_POST['Unidadmedida']['fechareg']= date("Y-m-d H:i:s");
              $_POST['Unidadmedida']['status']=true;
              $model->attributes=$_POST['Unidadmedida'];
               if ($model->save()) { //Guardar
                    return $this->redirect(['view', 'id_unidadmedida' => $model->id_unidadmedida]); //Direccionar a la vista view
               }

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
     * @param int $id_unidadmedida Id Unidadmedida
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*public function actionUpdate($id_unidadmedida)
    {
        $model = $this->findModel($id_unidadmedida);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_unidadmedida' => $model->id_unidadmedida]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }*/
    public function actionUpdate($id_unidadmedida)
    {
        $model = $this->findModel($id_unidadmedida);


        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
              /*Valores que no se registran por formulario pero que se deben guardar en BD en conjunto con los del formulario*/
              $_POST['Unidadmedida']['usuario']=(int)1;
              $_POST['Unidadmedida']['fechareg']= date("Y-m-d H:i:s");
              $_POST['Unidadmedida']['status']=true;
              $model->attributes=$_POST['Unidadmedida'];
               if ($model->save()) { //Guardar
                    return $this->redirect(['view', 'id_unidadmedida' => $model->id_unidadmedida]); //Direccionar a la vista view
               }

            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * Deletes an existing Unidadmedida model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_unidadmedida Id Unidadmedida
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*public function actionDelete($id_unidadmedida)
    {
        $this->findModel($id_unidadmedida)->delete();

        return $this->redirect(['index']);
    }*/


  /*  public function actionDelete($id_unidadmedida)
    {

      $models=new ModeloB;
      $model = $this->findModel($id_unidadmedida);


      $model->save()

        return $this->redirect(['index']);
    }*/



    /**
     * Finds the Unidadmedida model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_unidadmedida Id Unidadmedida
     * @return Unidadmedida the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_unidadmedida)
    {
        if (($model = Unidadmedida::findOne(['id_unidadmedida' => $id_unidadmedida])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
