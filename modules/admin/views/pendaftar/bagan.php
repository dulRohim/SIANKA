<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;


//mengambil data kelas
// foreach ($dKelas as $dKelas) {
// 	$kelas[] = $dKelas['kelas_nama'];
// }
// $no = 0;
// foreach ($model as $model) {
// echo Html::a($kelas[$no], ['/admin/pendaftar/atlet', 'ev' => $_GET['ev'], 'kls' => $model->bagan_id], ['class' => 'btn btn-success']);
// 	echo "</br>";
// 	$no++;
// } 

$this->title = 'List Bagan';
echo "<h2>".Html::encode($this->title)."</h2>";

echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kelas_id',
            [
                'attribute' => 'kelas_nama',
                'value' => 'kelas.kelas_nama',
            ],

            [
            	'class'		=> 'yii\grid\ActionColumn',
            	'template'	=> '{bagan} {juara} {drawing}',
            	'buttons'	=> [
            		'bagan'	=> function ($url, $model) {
            			$url = Url::to(['/admin/pendaftar/atlet', 'ev' => $_GET['ev'], 'kls' => $model->bagan_id]);
            			return Html::a('Lihat Atlet', $url, ['class' => 'btn btn-success']);
            		},
                    'juara' => function ($url, $model) {
                        $url = Url::to(['/admin/pendaftar/juara', 'ev' => $_GET['ev'], 'kls' => $model->bagan_id]);
                        return Html::a('Lihat Juara', $url, ['class' => 'btn btn-primary']);
                    },
                    'drawing' => function ($url, $model) {
                        // $url = Url::to(['/admin/pendaftar/juara', 'ev' => $_GET['ev'], 'kls' => $model->bagan_id]);
                        return Html::a('Lihat Drawing', '#', ['class' => 'btn btn-info']);
                    },
            	],
            ],
        ],
    ]);

    echo Html::a('Kembali', ['/admin/event/view', 'id' => $_GET['ev']], ['class' => 'btn btn-success']);
?>