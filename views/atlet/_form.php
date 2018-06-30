<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Atlet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="atlet-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'atlet_nik')->textInput(['maxlength' => true, 'type' => 'number']) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'atlet_nama')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?php
            echo '<label class="control-label">Tanggal Lahir</label>';
            echo DatePicker::widget([
                'model' => $model,
                'attribute' => 'atlet_tgl_lahir',
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
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'atlet_jk')->dropDownList([ 'Putra' => 'Putra', 'Putri' => 'Putri', ], ['prompt' => '']) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
