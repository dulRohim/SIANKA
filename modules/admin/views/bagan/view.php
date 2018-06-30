<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bagan */

$this->title = $model->kelas->kelas_nama." - ".$model->event->event_nama;
$this->params['breadcrumbs'][] = ['label' => 'Bagan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bagan-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->bagan_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->bagan_id], [
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
            'bagan_id',
            'kelas_id',
            'kelas.kelas_nama',
            'event_id',
            'event.event_nama',
        ],
    ]) ?>

</div>
