<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Unidadmedida $model */

$this->title = 'Actualizar Unidad de medida: ' . $model->id_unidadmedida;
$this->params['breadcrumbs'][] = ['label' => 'Unidadmedidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_unidadmedida, 'url' => ['view', 'id_unidadmedida' => $model->id_unidadmedida]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unidadmedida-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
