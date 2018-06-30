<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KtgAtlet */

$this->title = $model->ktg_atlet_id." - ".$model->atletNik->atlet_nama;
$this->params['breadcrumbs'][] = ['label' => 'Ktg Atlet', 'url' => ['index', 'ktg' => $_GET['ktg']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ktg-atlet-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ktg_atlet_id, 'ktg' => $_GET['ktg']], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ktg_atlet_id, 'ktg' => $_GET['ktg']], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ktg_atlet_id',
            'kontingen_id',
            'kontingen.kontingen_nama',
            'atlet_nik',
            'atletNik.atlet_nama',
        ],
    ]) ?>

</div>
