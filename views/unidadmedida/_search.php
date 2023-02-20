<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\unidadmedidaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="unidadmedida-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idunidadmedida') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'idusuario') ?>

    <?= $form->field($model, 'fechareg') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
