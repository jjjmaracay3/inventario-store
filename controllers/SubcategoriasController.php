<?php

namespace app\controllers;

use app\models\Subcategorias;
use app\models\subcategoriasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SubcategoriasController implements the CRUD actions for Subcategorias model.
 */
class SubcategoriasController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
      /*  return array_merge(
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
     * Lists all Subcategorias models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new subcategoriasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->where('estatus = true'); //Mostrar solo los registros activos

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Subcategorias model.
     * @param int $id_subcategoria Id Subcategoria
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_subcategoria)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_subcategoria),
        ]);
    }

    /**
     * Creates a new Subcategorias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Subcategorias();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
              /*Valores que no se registran por formulario pero que se deben guardar en BD en conjunto con los del formulario*/
              $_POST['Subcategorias']['id_usuario']=(int)1;
              $_POST['Subcategorias']['fechareg']= date("Y-m-d H:i:s");
              $_POST['Subcategorias']['estatus']=true;
              $model->attributes=$_POST['Subcategorias'];
               if ($model->save()) { //Guardar
                    return $this->redirect(['view', 'id_subcategoria' => $model->id_subcategoria]); //Direccionar a la vista view
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
     * Updates an existing Subcategorias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_subcategoria Id Subcategoria
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_subcategoria)
    {
        $model = $this->findModel($id_subcategoria);
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
              /*Valores que no se registran por formulario pero que se deben guardar en BD en conjunto con los del formulario*/
              $_POST['Subcategorias']['usuario']=(int)1;
              $_POST['Subcategorias']['fechareg']= date("Y-m-d H:i:s");
              $_POST['Subcategorias']['estatus']=true;
              $model->attributes=$_POST['Subcategorias'];
               if ($model->save()) { //Guardar
                    return $this->redirect(['view', 'id_subcategoria' => $model->id_subcategoria]); //Direccionar a la vista view
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
     * Deletes an existing Subcategorias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_subcategoria Id Subcategoria
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_subcategoria)
    {
        $this->findModel($id_subcategoria)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Subcategorias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_subcategoria Id Subcategoria
     * @return Subcategorias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_subcategoria)
    {
        if (($model = Subcategorias::findOne(['id_subcategoria' => $id_subcategoria])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
