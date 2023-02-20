<?php

use app\models\Unidadmedida;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\unidadmedidaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Unidadmedidas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidadmedida-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Unidadmedida', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idunidadmedida',
            'nombre',
            'idusuario',
            'fecha',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Unidadmedida $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idunidadmedida' => $model->idunidadmedida]);
                 }
            ],
        ],
    ]); ?>


</div>
