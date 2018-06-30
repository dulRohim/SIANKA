<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PendaftarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pendaftar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pendaftar_id') ?>

    <?= $form->field($model, 'ktg_atlet_id') ?>

    <?= $form->field($model, 'bagan_id') ?>

    <?= $form->field($model, 'berat_badan') ?>

    <?= $form->field($model, 'perguruan') ?>

    <?php // echo $form->field($model, 'prestasi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
