<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AtletSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Atlet';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atlet-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!-- <?php// Html::a('Create Atlet', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'atlet_nik',
            'atlet_nama',
            'atlet_tgl_lahir',
            'atlet_jk',

            [
                'class' => 'yii\grid\ActionColumn',
                'options'=> ['class'=>'action-column'],
                'template'=> '{view} {update}',
            ],
        ],
    ]); ?>
</div>
