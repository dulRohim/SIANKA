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
    <div class="body-content">
        <?php
        foreach ($dataEvent as $dataEvent) {
        ?>
        <div class="col-md-4">
            <h2><?= $dataEvent->event_nama ?></h2>

            <p><?= $dataEvent->event_info ?></p>
            <p>Mulai &nbsp;&nbsp;&nbsp;&nbsp;: <?= $dataEvent->event_tgl_mulai ?></p>
            <p>Selesai &nbsp;: <?= $dataEvent->event_tgl_selesai ?></p>
            <p><a><?=Html::a("Lihat Detail Kejuaraan", ['event/view', 'id' => $dataEvent->event_id], ['class' => 'btn btn-primary']); ?></a></p>
        </div>
        <?php } ?>
    </div>
</div>
