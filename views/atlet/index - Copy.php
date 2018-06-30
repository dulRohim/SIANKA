<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AtletSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Atlets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atlet-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Tambah Atlet', ['value' => Url::to('index.php?r=atlet/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) ?>
    </p>

    <table>
        <th>
            <td>
                NIK
            </td>
            <td>
                Nama
            </td>
            <td>
                Tanggal Lahir
            </td>
            <td>
                Jenis Kelamin
            </td>
        </th>
    <?php
    Modal::begin([
        'header' => '<h4>Tambah Atlet</h4>',
        'id' => 'modal',
        'size' => 'modal-lg',
    ]);

    echo "<div id='modelContent'></div>";

    Modal::end();

    foreach ($dEvent as $dEvent) {
    ?>
        <tr>
            <td>
                <?= $dEvent->atlet_nik ?>
            </td>
        </tr>
    <?php
    }
    ?>

    <?// GridView::widget([
    //     'dataProvider' => $dataProvider,
    //     'filterModel' => $searchModel,
    //     'columns' => [
    //         ['class' => 'yii\grid\SerialColumn'],

    //         'atlet_nik',
    //         'atlet_nama',
    //         'atlet_tgl_lahir',
    //         'atlet_jk',

    //         [
    //             'class' => 'yii\grid\ActionColumn',
    //             'options'=> ['class'=>'action-column'],
    //             'template'=> '{update} {delete}',
    //             'buttons'=>[
    //                 'update' => function($url,$model,$key){
    //                     $btn = Html::button("<span class='glyphicon glyphicon-pencil'></span>",
    //                     ['value' => Url::to('index.php?r=atlet/update?id='.$key), 'class'=>'btn btn-primary', 'id' => 'modalButtonUpdate']);
    //                     return $btn;
    //                 }
    //             ]
    //         ],
    //     ],
    // ]); 
    ?>

    </table>
</div>
