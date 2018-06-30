<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kelas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kelas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kelas_id')->textInput(['maxlength' => true, 'disabled' => true]) ?>

    <?= $form->field($model, 'kelas_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kelas_kategori')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kelas_jk')->dropDownList([ 'Putra' => 'Putra', 'Putri' => 'Putri', ], ['prompt' => 'Jenis Kelamin']) ?>

    <?= $form->field($model, 'kelas_usia')->textInput() ?>

    <?= $form->field($model, 'kelas_beratbadan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
