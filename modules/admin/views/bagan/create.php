<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bagan */

$this->title = 'Create Bagan';
$this->params['breadcrumbs'][] = ['label' => 'Bagans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bagan-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
