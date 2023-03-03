<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Subcategorias $model */

$this->title = $model->id_subcategoria;
$this->params['breadcrumbs'][] = ['label' => 'Subcategorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="subcategorias-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id_subcategoria' => $model->id_subcategoria], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_subcategoria' => $model->id_subcategoria], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro que deseas eliminar este registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_subcategoria',
            'id_categoria',
            'nombre',
            'id_usuario',
            'fechareg',
            'estatus:boolean',
        ],
    ]) ?>

</div>
