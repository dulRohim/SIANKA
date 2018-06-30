<?php
use yii\helpers\Html;

$this->title = "List Atlet - ".$model->bagan->kelas->kelas_nama;


$no = 0;
foreach ($mKtg as $mKtg) {
	$ktg[] = $mKtg['kontingen_nama']."</br>";
	$no++;
}
?>

<h2><?= Html::encode($this->title) ?></h2>
<table class="table table-hover ">
	<thead>
		<th width="75px">No</th>
		<th>Nama Atlet</th>
		<th width="400px">Kontingen</th>
	</thead>
	<tbody>
		<?php
		$noo = 1;
		for($i = 0; $i<$no; $i++){
		?>
		<tr>
			<td><?= $noo; ?></td>
			<td><?= $mAtlet[$i]['atlet_nama']; ?></td>
			<td><?=$ktg[$i]; ?></td>
			<?php $noo++; } ?> 
		</tr>
	</tbody>
</table>

<?php
// for($i = 0; $i<$no; $i++){
// 	echo $mAtlet[$i]['atlet_nama']." - ".$ktg[$i];
// }

echo "</br>".Html::a('Kembali', ['/admin/pendaftar/bagan', 'ev' => $_GET['ev']], ['class'=>'btn btn-primary']);

// $no = 0;
// foreach ($ as $) {
// 	echo $atlet[$no]." - ".$ktg[$no]."</br>";
// 	$no++;
// } 
?>