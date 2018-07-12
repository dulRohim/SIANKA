<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Atlet */

$this->title = $model->atlet_nik." - ".$model->atlet_nama;
$this->params['breadcrumbs'][] = ['label' => 'Atlet', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atlet-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->atlet_nik], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->atlet_nik], [
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
            'atlet_nik',
            'atlet_nama',
            'atlet_tgl_lahir',
            'atlet_jk',
        ],
    ]) ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Event</th>
            <th>Nama Kelas</th>
            <th>Peringkat</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($juara as $ju) { ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $ju->bagan->event->event_nama ?></td>
                <td><?= $ju->bagan->kelas->kelas_nama ?></td>
                <td><?= $ju->prestasi ?></td>
            </tr>
        <?php $no++; }?>
    </tbody>
</table>
</div>
