<?php

use app\models\InventarioEmpresas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\empresasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Empresa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventario-empresas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_empresa',
            'rif',
            'nombre',
            'direccion:ntext',
            'correo',
            //'telefono1',
            //'telefono2',
            //'redes',
            //'slogan',
            //'logo',
            //'id_usuario',
            //'fechareg',
            //'estatus:boolean',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, InventarioEmpresas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_empresa' => $model->id_empresa]);
                 }
            ],
        ],
    ]); ?>


</div>
