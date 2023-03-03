<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\InventarioEmpresas $model */

$this->title = 'Moificar: ' . $model->id_empresa;
$this->params['breadcrumbs'][] = ['label' => 'Empresa', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_empresa, 'url' => ['view', 'id_empresa' => $model->id_empresa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inventario-empresas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
