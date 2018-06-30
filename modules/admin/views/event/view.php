<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = $model->event_id." - ".$model->event_nama;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->event_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->event_id], [
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
            'event_id',
            'event_nama',
            'event_tgl_mulai',
            'event_tgl_selesai',
            'event_tempat',
            'event_info',
            'event_create',
        ],
    ]) ?>

    <?= Html::a('Lihat List Atlet', ['pendaftar/index', 'ev' => $model->event_id], ['class'=>'btn btn-primary']); ?>
    <?= Html::a('Lihat List Bagan', ['pendaftar/bagan', 'ev' => $model->event_id], ['class'=>'btn btn-success']); ?>
    <?= Html::a('Lihat Perolehan Medali', ['pendaftar/medali', 'ev' => $model->event_id], ['class'=>'btn btn-info']); ?>

</div>
