<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kontingen */

$this->title = 'Create Kontingen';
$this->params['breadcrumbs'][] = ['label' => 'Login', 'url' => ['login']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kontingen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $id_terakhir = $model->getLast(); ?>
    <?= $temp_id_ktg = substr($id_terakhir, 2, 6); ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
