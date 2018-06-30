<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BaganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bagan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bagan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Bagan', ['value' => Url::to('index.php?r=admin/bagan/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) ?>
    </p>

    <?php
    Modal::begin([
        // 'header' => '<h4>Buat Bagan</h4>',
        'id' => 'modal',
        'size' => 'modal-lg',
    ]);

    echo "<div id='modelContent'></div>";

    Modal::end();
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bagan_id',
            'kelas_id',
            // 'kelas.kelas_nama',
            [
                'attribute' => 'kelas_nama',
                'value' => 'kelas.kelas_nama',
            ],
            'event_id',
            // 'event.event_nama',
            [
                'attribute' => 'kelas_nama',
                'value' => 'kelas.kelas_nama',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
