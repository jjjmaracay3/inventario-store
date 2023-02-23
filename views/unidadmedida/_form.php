<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Unidadmedida $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="unidadmedida-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'unidadmedida')->textInput(['maxlength' => true]) ?>

  <!--  <?= $form->field($model, 'usuario')->textInput() ?>

    <?= $form->field($model, 'fechareg')->textInput() ?>

    <?= $form->field($model, 'estatus')->checkbox() ?>-->

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
