<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use yii\widgets\ActiveForm;

use app\models\Atlet;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\KtgAtlet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ktg-atlet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'ktg_atlet_id')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'kontingen_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'atlet_nik')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Atlet::find()->all(), 'atlet_nik', 'atlet_nama'),
            'language' => 'de',
            'options' => ['placeholder' => '=== Pilih Atlet ===',],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
