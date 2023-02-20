<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Unidadmedida $model */

$this->title = 'Crear Unidad de medida';
$this->params['breadcrumbs'][] = ['label' => 'Unidadmedidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidadmedida-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
