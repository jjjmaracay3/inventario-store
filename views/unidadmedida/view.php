<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Unidadmedida $model */

$this->title = $model->idunidadmedida;
$this->params['breadcrumbs'][] = ['label' => 'Unidadmedidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="unidadmedida-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idunidadmedida' => $model->idunidadmedida], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idunidadmedida' => $model->idunidadmedida], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Está seguro de eliminar este registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idunidadmedida',
            'nombre',
            'idusuario',
            'fechareg',
        ],
    ]) ?>

</div>
