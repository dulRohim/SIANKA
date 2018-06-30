<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pendaftar */

$this->title = 'Create Pendaftar';
$this->params['breadcrumbs'][] = ['label' => 'Pendaftars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendaftar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'ev' => $ev,
    ]) ?>

</div>
