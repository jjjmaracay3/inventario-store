<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Categorias $model */

$this->title = $model->id_categoria;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="categorias-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id_categoria' => $model->id_categoria], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_categoria' => $model->id_categoria], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro que desea eliminar este registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_categoria',
            'nombre',
            'id_usuario',
            'fechareg',
            'estatus:boolean',
        ],
    ]) ?>

</div>
