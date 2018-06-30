<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;

use app\models\Kelas;
use app\models\Event;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Bagan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bagan-form">

    <?php $form = ActiveForm::begin(); ?>

    	<?= $form->field($model, 'kelas_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Kelas::find()->all(),'kelas_id','kelas_nama'),
            'language' => 'de',
            'options' => ['placeholder' => '=== Pilih Kelas ===',],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>
    		<?= $form->field($model, 'event_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Event::find()->all(),'event_id','event_nama'),
            'language' => 'de',
            'options' => ['placeholder' => '=== Pilih Event ===',],
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
