<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KtgAtlet */

$this->title = 'Create Ktg Atlet';
$this->params['breadcrumbs'][] = ['label' => 'Ktg Atlets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ktg-atlet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'ktg' => $ktg,
    ]) ?>

</div>
