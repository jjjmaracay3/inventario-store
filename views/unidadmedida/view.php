<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Unidadmedida $model */

$this->title = $model->id_unidadmedida;
$this->params['breadcrumbs'][] = ['label' => 'Unidadmedidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="unidadmedida-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id_unidadmedida' => $model->id_unidadmedida], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_unidadmedida' => $model->id_unidadmedida], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estás seguro de eliminar este registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'unidadmedida',
            'usuario',
            'fechareg',

        ],
    ]) ?>

</div>
