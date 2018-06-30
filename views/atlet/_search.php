<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AtletSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="atlet-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'atlet_nik') ?>

    <?= $form->field($model, 'atlet_nama') ?>

    <?= $form->field($model, 'atlet_tgl_lahir') ?>

    <?= $form->field($model, 'atlet_jk') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
