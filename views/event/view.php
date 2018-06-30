<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = $model->event_nama;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'event_id',
            'event_nama',
            'event_tgl_mulai',
            'event_tgl_selesai',
            'event_tempat',
            'event_info',
            // 'event_create',
        ],
    ]) ?>
    <?php
    $dateNow = Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');

    if ($dateNow > $model->event_tgl_selesai) {
        echo "Event telah selesai! </br>";
        echo Html::a('Lihat Kelas', ['pendaftar/bagan', 'ev' => $model->event_id], ['class'=>'btn btn-primary']);
        echo "&nbsp;";
        echo Html::a('Perolehan Medali', ['pendaftar/medali', 'ev' => $model->event_id], ['class'=>'btn btn-success']); 
    } elseif ($dateNow >= $model->event_tgl_mulai) {
        echo "Event Sedang Berlangsung! </br>";
        echo Html::a('Lihat Kelas', ['pendaftar/bagan', 'ev' => $model->event_id], ['class'=>'btn btn-primary']);
        echo "&nbsp;";
        echo Html::a('Perolehan Medali', ['pendaftar/medali', 'ev' => $model->event_id], ['class'=>'btn btn-success']); 
    } else {
        if(!Yii::$app->user->isGuest){
             echo Html::a('Join Event', ['pendaftar/index', 'ev' => $model->event_id, 'ktg' => Yii::$app->user->identity->kontingen_id], ['class'=>'btn btn-primary']);
        } else {
            echo Html::a('Join Event', ['pendaftar/index', 'ev' => $model->event_id], ['class'=>'btn btn-primary']);
        }
    }
    ?>
</div>
