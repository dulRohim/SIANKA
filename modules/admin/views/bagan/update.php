<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bagan */

$this->title = 'Update Bagan: ' . $model->kelas->kelas_nama;
$this->params['breadcrumbs'][] = ['label' => 'Bagan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bagan_id, 'url' => ['view', 'id' => $model->bagan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bagan-update">

    <!-- <h3><?= Html::encode($this->title) ?></h3> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
