<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Atlet */

$this->title = 'Update Atlet: ' . $model->atlet_nik;
$this->params['breadcrumbs'][] = ['label' => 'Atlets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->atlet_nik, 'url' => ['view', 'id' => $model->atlet_nik]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="atlet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
