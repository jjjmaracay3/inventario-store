<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\InventarioEmpresas $model */

$this->title = 'Crear Empresas';
$this->params['breadcrumbs'][] = ['label' => 'Empresa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventario-empresas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
