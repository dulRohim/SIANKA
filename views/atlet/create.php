<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Atlet */

$this->title = 'Create Atlet';
$this->params['breadcrumbs'][] = ['label' => 'Atlets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atlet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
