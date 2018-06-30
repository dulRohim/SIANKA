<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kontingen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kontingen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kontingen_id')->textInput(['maxlength' => true, 'disabled' => 'disabled']) ?>

    <?= $form->field($model, 'kontingen_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kontingen_official')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kontingen_cp')->textInput(['maxlength' => true, 'type' => 'number']) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'authKey')->hiddenInput()->label(false); ?>

    <?= $form->field($model, 'accessToken')->hiddenInput()->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
