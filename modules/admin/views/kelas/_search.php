<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KelasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kelas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kelas_id') ?>

    <?= $form->field($model, 'kelas_nama') ?>

    <?= $form->field($model, 'kelas_kategori') ?>

    <?= $form->field($model, 'kelas_jk') ?>

    <?= $form->field($model, 'kelas_usia') ?>

    <?php // echo $form->field($model, 'kelas_beratbadan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
