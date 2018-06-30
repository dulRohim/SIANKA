<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PendaftarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pendaftar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendaftar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pendaftar', ['create', 'ev' => $_GET['ev'], 'ktg' => $_GET['ktg']], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'pendaftar_id',
            'ktg_atlet_id',
            [
                'attribute' => 'atlet_nama',
                'value' => 'ktgAtlet.atletNik.atlet_nama'
            ],
            'bagan_id',
            [
                'attribute' => 'event_id',
                'value' => 'bagan.event.event_id'
            ],
            [
                'attribute' => 'event_nama',
                'value' => 'bagan.event.event_nama'
            ],
            [
                'attribute' => 'kelas_nama',
                'value' => 'bagan.kelas.kelas_nama'
            ],
            'berat_badan',
            'perguruan',
            //'prestasi',

            [
                'class'     => 'yii\grid\ActionColumn',
                'template'  => '{view} {edit} {delete}',
                'buttons'   => [
                    'view' => function ($url, $model) {
                        $url = Url::to(['/pendaftar/view', 'ev' => $_GET['ev'], 'id' => $model->pendaftar_id]);
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['class' => 'btn btn-success']);
                    },
                    'edit' => function ($url, $model) {
                        $url = Url::to(['/pendaftar/update', 'ktg' => $_GET['ktg'], 'ev' => $_GET['ev'], 'id' => $model->pendaftar_id]);
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['class' => 'btn btn-primary']);
                    },
                    'delete' => function ($url, $model) {
                        $url = Url::to(['/pendaftar/delete', 'ktg' => $_GET['ktg'], 'ev' => $_GET['ev'], 'id' => $model->pendaftar_id]);
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'class' => 'btn btn-danger',
                            'title' => 'delete',
                            'data-confirm'  => Yii::t('yii', 'Are you sure that you want to delete this item?'),
                            'data-method'   => 'post',
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
