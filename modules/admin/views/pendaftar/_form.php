<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use yii\widgets\ActiveForm;
use yii\db\ActiveQuery;

use app\models\KtgAtlet;
use app\models\Atlet;
use app\models\Bagan;
use app\models\Pendaftar;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Pendaftar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pendaftar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ktg_atlet_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Pendaftar::find()->joinWith('bagan')->where(['event_id' => $_GET['ev']])->all(), 'ktgAtlet.ktg_atlet_id', 'ktgAtlet.atletNik.atlet_nama'),
            'language' => 'de',
            'options' => ['placeholder' => '=== Pilih Atlet ===',],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'bagan_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Bagan::find()->where(['event_id' => $_GET['ev'] ])->all(), 'bagan_id', 'kelas.kelas_nama'),
            'language' => 'de',
            'options' => ['placeholder' => '=== Pilih Kelas ===',],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'info_grup[]')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Pendaftar::find()->joinWith('bagan')->where(['event_id' => $_GET['ev']])->all(), 'ktgAtlet.ktg_atlet_id', 'ktgAtlet.atletNik.atlet_nama'),
            'language' => 'de',
            'options' => [
                'placeholder' => '=== Pilih Atlet ===',
                'multiple'  => true,
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'berat_badan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perguruan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prestasi')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Kembali', ['pendaftar/index', 'ev' => $_GET['ev']], ['class'=>'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
