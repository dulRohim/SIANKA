<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Atlet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="atlet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'atlet_nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'atlet_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'atlet_tgl_lahir')->textInput() ?>

    <?= $form->field($model, 'atlet_jk')->dropDownList([ 'Putra' => 'Putra', 'Putri' => 'Putri', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
