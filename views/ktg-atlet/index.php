<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KtgAtletSeaarch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ktg Atlets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ktg-atlet-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ktg Atlet', ['create', 'ktg' => Yii::$app->user->identity->kontingen_id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ktg_atlet_id',
            // 'kontingen.kontingen_nama',
            [
                'attribute' => 'kontingen_nama',
                'value' => 'kontingen.kontingen_nama'
            ],
            // 'atlet_nik',
            // 'atletNik.atlet_nama',
            [
                'attribute' => 'atlet_nama',
                'value' => 'atletNik.atlet_nama'
            ],

            [
                'class'     => 'yii\grid\ActionColumn',
                'template'  => '{view} {edit} {delete}',
                'buttons'   => [
                    'view' => function ($url, $model) {
                        $url = Url::to(['/ktg-atlet/view', 'ktg' => $_GET['ktg'], 'id' => $model->ktg_atlet_id]);
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['class' => 'btn btn-success']);
                    },
                    'edit' => function ($url, $model) {
                        $url = Url::to(['/ktg-atlet/update', 'ktg' => Yii::$app->user->identity->kontingen_id, 'id' => $model->ktg_atlet_id]);
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['class' => 'btn btn-primary']);
                    },
                    'delete' => function ($url, $model) {
                        $url = Url::to(['/ktg-atlet/delete', 'ktg' => $_GET['ktg'], 'id' => $model->ktg_atlet_id]);
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
