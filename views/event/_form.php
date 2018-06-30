<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'event_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'event_tgl_mulai')->textInput() ?>

    <?= $form->field($model, 'event_tgl_selesai')->textInput() ?>

    <?= $form->field($model, 'event_tempat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'event_info')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'event_create')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
