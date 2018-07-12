<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Event';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="body-content">
        <?php
        foreach ($dataEvent as $dataEvent) {
        ?>
        <div class="col-md-6">
            <h2><?= $dataEvent->event_nama ?></h2>

            <p><?= $dataEvent->event_info ?></p>
            <p>Mulai &nbsp;&nbsp;&nbsp;&nbsp;: <?= $dataEvent->event_tgl_mulai ?></p>
            <p>Selesai &nbsp;: <?= $dataEvent->event_tgl_selesai ?></p>
            <p><a><?=Html::a("Lihat Detail Kejuaraan", ['event/view', 'id' => $dataEvent->event_id], ['class' => 'btn btn-primary']); ?></a></p>
        </div>
        <?php } ?>
    </div>
</div>
