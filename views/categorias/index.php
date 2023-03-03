<?php

use app\models\Categorias;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\categoriasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorias-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Categorias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_categoria',
            'nombre',
            'id_usuario',
            'fechareg',
            'estatus:boolean',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Categorias $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_categoria' => $model->id_categoria]);
                 }
            ],
        ],
    ]); ?>


</div>
