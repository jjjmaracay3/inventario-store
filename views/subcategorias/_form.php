<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Categorias;

/** @var yii\web\View $this */
/** @var app\models\Subcategorias $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="subcategorias-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'id_categoria')->textInput() ?> -->

    <?= $form->field($model, 'id_categoria')->dropDownList(
        ArrayHelper::map(Categorias::find(array('condition'=>"estatus = true",'order' => 'name desc'))->all(), 'id_categoria', 'nombre'),['prompt' => 'Seleccione...' ]
    ) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <!--<?= $form->field($model, 'id_usuario')->textInput() ?>

    <?= $form->field($model, 'fechareg')->textInput() ?>

    <?= $form->field($model, 'estatus')->checkbox() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
