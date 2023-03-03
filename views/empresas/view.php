<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\InventarioEmpresas $model */

$this->title = $model->id_empresa;
$this->params['breadcrumbs'][] = ['label' => 'Inventario Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="inventario-empresas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id_empresa' => $model->id_empresa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_empresa' => $model->id_empresa], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que desea eliminar este registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_empresa',
            'rif',
            'nombre',
            'direccion:ntext',
            'correo',
            'telefono1',
            'telefono2',
            'redes',
            'slogan',
            'logo',
            'id_usuario',
            'fechareg',
            'estatus:boolean',
        ],
    ]) ?>

</div>
