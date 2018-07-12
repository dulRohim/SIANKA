<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Pendaftar;
use app\models\ktgAtlet;

/* @var $this yii\web\View */
/* @var $model app\models\Pendaftar */

$this->title = $model->ktg_atlet_id." - ".$model->ktgAtlet->atletNik->atlet_nama;
$this->params['breadcrumbs'][] = ['label' => 'Pendaftar', 'url' => ['index', 'ktg' => Yii::$app->user->identity->kontingen_id, 'ev' => $_GET['ev']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendaftar-view">

    <h3><?= Html::encode($model->ktg_atlet_id)." - ".$model->ktgAtlet->atletNik->atlet_nama ?></h3>

    <p>
        <?php // Html::a('Update', ['update', 'id' => $model->pendaftar_id], ['class' => 'btn btn-primary']) ?>
         <?php 
         // Html::a('Delete', ['delete', 'id' => $model->pendaftar_id], [
        //     'class' => 'btn btn-danger',
        //     'data' => [
        //         'confirm' => 'Are you sure you want to delete this item?',
        //         'method' => 'post',
        //     ],
        // ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pendaftar_id',
            'ktg_atlet_id',
            'ktgAtlet.atletNik.atlet_nama',
            // 'bagan_id',
            // 'bagan.event.event_id',
            'bagan.event.event_nama',
            'bagan.kelas.kelas_nama',
            // 'info_grup',
            [
                'attribute' => 'info_grup',
                'format' => 'raw',
                'value' => function($data, $row) {
                    $temp = json_decode($data['info_grup'], true);
                    $array = array();
                    if ($temp != null) {
                       foreach($temp as $t){
                        $data = ktgAtlet::find()->joinWith(['pendaftar', 'atletNik'])
                        ->where(
                            [
                                'ktg_atlet.ktg_atlet_id'=>$t,
                            ])
                        ->one();
                        $array[] = $data['atletNik']['atlet_nama'];
                        
                        
                    }
                    }
                    return implode($array,"<br>");


                }
            ],
            'berat_badan',
            'perguruan',
            'prestasi',
        ],
    ]) ?>

</div>
