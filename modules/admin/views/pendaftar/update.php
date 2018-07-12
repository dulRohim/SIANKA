<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pendaftar */

$this->title = 'Update : '.$model->ktgAtlet->atletNik->atlet_nama;
$this->params['breadcrumbs'][] = ['label' => 'Pendaftar', 'url' => ['index', 'ev' => $_GET['ev']]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pendaftar-update">

    <!-- <h3><?= Html::encode($this->title) ?></h3> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
