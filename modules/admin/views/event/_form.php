<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_id')->textInput(['maxlength' => true, 'disabled' => 'disabled']) ?>

    <?= $form->field($model, 'event_nama')->textInput(['maxlength' => true]) ?>

    <?php
    echo '<label class="control-label">Tanggal Mulai</label>';
    echo DatePicker::widget([
        'model' => $model,
        'attribute' => 'event_tgl_mulai',
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'options' => ['placeholder' => 'Masukkan tanggal'],
        'pluginOptions' => [
            'todayHighlight' => true,
            'autoclose'=>true,
            'format' => 'yyyy/mm/dd'
        ]
    ]);
     ?>
     <br>

    <?php
    echo '<label class="control-label">Tanggal Selesai</label>';
    echo DatePicker::widget([
        'model' => $model,
        'attribute' => 'event_tgl_selesai',
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'options' => ['placeholder' => 'Masukkan tanggal'],
        'pluginOptions' => [
            'todayHighlight' => true,
            'autoclose'=>true,
            'format' => 'yyyy/mm/dd'
        ]
    ]);
     ?>
     <br>

    <?= $form->field($model, 'event_tempat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'event_info')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'event_create')->textInput(['disabled' => 'disabled']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
