<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Subcategorias $model */

$this->title = 'Modificar Subcategorias: ' . $model->id_subcategoria;
$this->params['breadcrumbs'][] = ['label' => 'Subcategorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_subcategoria, 'url' => ['view', 'id_subcategoria' => $model->id_subcategoria]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subcategorias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
