<?php

use app\models\Subcategorias;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\subcategoriasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Subcategorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subcategorias-index">

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

            'id_subcategoria',
            'id_categoria',
            'nombre',
            'id_usuario',
            'fechareg',
            //'estatus:boolean',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Subcategorias $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_subcategoria' => $model->id_subcategoria]);
                 }
            ],
        ],
    ]); ?>


</div>
