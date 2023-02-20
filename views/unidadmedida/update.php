<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Unidadmedida $model */

$this->title = 'Update Unidadmedida: ' . $model->idunidadmedida;
$this->params['breadcrumbs'][] = ['label' => 'Unidadmedidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idunidadmedida, 'url' => ['view', 'idunidadmedida' => $model->idunidadmedida]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unidadmedida-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
