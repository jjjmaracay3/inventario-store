<?php

namespace app\controllers;

use app\models\Categorias;
use app\models\categoriasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use webvimark\modules\UserManagement\models\User;
use webvimark\modules\UserManagement\models\search\UserSearch;
/**
 * CategoriasController implements the CRUD actions for Categorias model.
 */
class CategoriasController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        /*return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );*/
        return [
          'ghost-access'=> [
              'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    /**
     * Lists all Categorias models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new categoriasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Categorias model.
     * @param int $id_categoria Id Categoria
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_categoria)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_categoria),
        ]);
    }

    /**
     * Creates a new Categorias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
      public function actionCreate()
      {
          $model = new Categorias();

          if ($this->request->isPost) {
              if ($model->load($this->request->post())) {
                /*Valores que no se registran por formulario pero que se deben guardar en BD en conjunto con los del formulario*/
                //$_POST['Categorias']['id_usuario']=Yii::app()->user->getId();
                $_POST['Categorias']['id_usuario']= Yii::$app->user->id;
                $_POST['Categorias']['fechareg']= date("Y-m-d H:i:s");
                $_POST['Categorias']['estatus']=true;
                $model->attributes=$_POST['Categorias'];
                 if ($model->save()) { //Guardar
                      return $this->redirect(['view', 'id_categoria' => $model->id_categoria]); //Direccionar a la vista view
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
     * Updates an existing Categorias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_categoria Id Categoria
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_categoria)
    {
        $model = $this->findModel($id_categoria);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_categoria' => $model->id_categoria]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Categorias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_categoria Id Categoria
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_categoria)
    {
        $this->findModel($id_categoria)->delete();

        return $this->redirect(['index']);
    }



    

    /**
     * Finds the Categorias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_categoria Id Categoria
     * @return Categorias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_categoria)
    {
        if (($model = Categorias::findOne(['id_categoria' => $id_categoria])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
