<?php
use yii\helpers\Html;

$this->title = "List Juara - ".$kelas->bagan->kelas->kelas_nama;


$no = 0;
foreach ($mKtg as $mKtg) {
	$ktg[] = $mKtg['kontingen_nama'];
	$no++;
}

$noo = 0;
foreach ($mAtlet as $mAtlet) {
	$atlet[] = $mAtlet['atlet_nama'];
	$noo++;
}
?>
<h2><?= Html::encode($this->title) ?></h2>
<table class="table table-hover ">
	<thead>
		<th width="100px">No</th>
		<th>Nama Atlet</th>
		<th width="400px">Kontingen</th>
	</thead>
	<tbody>
		<?php
		for($i = 0; $i < $no; $i++) {
		?>
		<tr>
			<td><?= "Juara ".$model[$i]['prestasi'] ?></td>
			<td><?= $atlet[$i] ?></td>
			<td><?= $ktg[$i] ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php
// print_r($model);
// for($i = 0; $i < $no; $i++) {
// 	echo "Juara Ke-".$model[$i]['prestasi']." : ".$atlet[$i]." - ".$ktg[$i]."</br>";
// }

echo "</br>".Html::a('Kembali', ['/pendaftar/bagan', 'ev' => $_GET['ev']], ['class'=>'btn btn-primary']);

// for($i = 0; $i < $no; $i++) {
// 	echo $juara[$i] = $atlet[$i]." - ".$ktg[$i]." - ".$model[$i]['prestasi'];
// }