<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pendaftar */

$this->title = 'Update Pendaftar: ' . $model->pendaftar_id;
$this->params['breadcrumbs'][] = ['label' => 'Pendaftar', 'url' => ['index', 'ktg' => Yii::$app->user->identity->kontingen_id, 'ev' => $_GET['ev']]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pendaftar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'ev' => $ev,
        'ktg' => $ktg,
        'temp' => $temp,
    ]) ?>

</div>
