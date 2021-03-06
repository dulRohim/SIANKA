<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EventSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'event_id') ?>

    <?= $form->field($model, 'event_nama') ?>

    <?= $form->field($model, 'event_tgl_mulai') ?>

    <?= $form->field($model, 'event_tgl_selesai') ?>

    <?= $form->field($model, 'event_tempat') ?>

    <?php // echo $form->field($model, 'event_info') ?>

    <?php // echo $form->field($model, 'event_create') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
