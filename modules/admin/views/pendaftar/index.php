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

    <h1><?php // Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Pendaftar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'pendaftar_id',
            // 'ktg_atlet_id',
            [
                'attribute' => 'atlet_nama',
                'value' => 'ktgAtlet.atletNik.atlet_nama'
            ],
            // 'bagan_id',
            [
                'attribute' => 'kelas_nama',
                'value' => 'bagan.kelas.kelas_nama',
            ],
            
            'berat_badan',
            'perguruan',
            'prestasi',

            [
                'class'     => 'yii\grid\ActionColumn',
                'template'  => '{view} {update} {delete}',
                'buttons'   => [
                    'view' => function ($url, $model) {
                        $url = Url::to(['/admin/pendaftar/view', 'ev' => $_GET['ev'], 'id' => $model->pendaftar_id]);
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['class' => 'btn btn-success']);
                    },
                    'update' => function ($url, $model) {
                        $url = Url::to(['/admin/pendaftar/update', 'ev' => $_GET['ev'], 'id' => $model->pendaftar_id]);
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['class' => 'btn btn-primary']);
                    },
                    'delete' => function ($url, $model) {
                        $url = Url::to(['/admin/pendaftar/delete', 'ev' => $_GET['ev'], 'id' => $model->pendaftar_id]);
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

    <?= Html::a('Kembali', ['/admin/event/view', 'id' => $_GET['ev']], ['class' => 'btn btn-success']); ?>
</div>
