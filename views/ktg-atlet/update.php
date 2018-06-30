<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KtgAtlet */

$this->title = 'Update Ktg Atlet: ' . $model->ktg_atlet_id;
$this->params['breadcrumbs'][] = ['label' => 'Ktg Atlet', 'url' => ['index', 'ktg' => $_GET['ktg']]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ktg-atlet-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
