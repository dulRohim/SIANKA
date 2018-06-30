<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use yii\widgets\ActiveForm;
use yii\db\ActiveQuery;

use app\models\KtgAtlet;
use app\models\Atlet;
use app\models\Bagan;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Pendaftar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pendaftar-form">

    <?php $form = ActiveForm::begin(); ?>
<?php 
// $dKtg = KtgAtlet::find()->where(['kontingen_id' => $ktg ])->all();
// foreach ($dKtg as $dKtg) {
//     $dAtlet[] = Atlet::find()->where(['atlet_nik' => $dKtg->atlet_nik])->all();
// }
?>
    <!-- 
    'atletNik.atlet_nama' digunakan untuk mengambil data nama atlet dimana atletNik adalah relasi dari model.
     -->
    <?= $form->field($model, 'ktg_atlet_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(KtgAtlet::find()->where(['kontingen_id' => $ktg ])->all(), 'ktg_atlet_id', 'atletNik.atlet_nama'),
            'language' => 'de',
            'options' => ['placeholder' => '=== Pilih Atlet ===',],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'bagan_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Bagan::find()->where(['event_id' => $ev ])->all(), 'bagan_id', 'kelas.kelas_nama'),
            'language' => 'de',
            'options' => ['placeholder' => '=== Pilih Kelas ===',],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>
    <?php
    if ($model->isNewRecord) {
        # code...
    ?>
    <?= $form->field($model, 'info_grup[]')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(KtgAtlet::find()->where(['kontingen_id' => $ktg ])->all(), 'ktg_atlet_id', 'atletNik.atlet_nama'),
            'language' => 'id',
            'options' => [
                'placeholder' => '=== Pilih Regu ===',
                'multiple'  => true
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>
    <?php } else {
        $data = ArrayHelper::map(KtgAtlet::find()->where(['ktg_atlet_id' => $temp ])->asArray()->all(), 'ktg_atlet_id', 'atletNik.atlet_nama');

     ?>
     <?= $form->field($model, 'info_grup[]')->widget(Select2::classname(), [
            'data' =>  ArrayHelper::map(KtgAtlet::find()->where(['kontingen_id' => $ktg ])->all(), 'ktg_atlet_id', 'atletNik.atlet_nama'),
            'language' => 'id',
            'value' => $temp,
            'options' => [
                'placeholder' => '=== Pilih Regu ===',
            ],
            'pluginOptions' => [
                'allowClear' => true,
                'multiple'  => true,
            ],
        ]); }
    ?>


    <?= $form->field($model, 'berat_badan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perguruan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prestasi')->textInput(['maxlength' => true])->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Kembali', ['pendaftar/index', 'ev' => $_GET['ev'], 'ktg' => $_GET['ktg']], ['class'=>'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
