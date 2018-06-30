<h3>Perolehan Medali</h3>
<?php
use yii\helpers\Html;
use app\models\Kontingen;

// print_r($model[0]->ktgAtlet->kontingen_id);
// foreach ($model as $models) {
// 	echo $models['kontingen_nama'].$emas."</br>";

// }
// print_r($model);

// echo count($model);
$this->title = "Perolehan Medali";
?>
<table id="example" class="table table-hover" style="width:100%">
	<thead>
		<th width="75px">No</th>
		<th>Nama Kontingen</th>
		<th width="150px" style="background-color: gold;">Emas</th>
		<th width="150px" style="background-color: silver;">Perak</th>
		<th width="150px" style="background-color: #cd7f32;">Perunggu</th>
	</thead>
	<tbody>
<?php
$no = 1;
for ($i=0; $i < count($model); $i++) { ?>

	<tr>
		<td><?= $no ?></td>
		<td><?= $model[$i]['kontingen_nama'] ?></td>
		<td><?= $emas[$i] ?></td>
		<td><?= $perak[$i] ?></td>
		<td><?= $perunggu[$i] ?></td>
	</tr>

<?php $no++; }

?>
	</tbody>
	<tfoot>
		<th width="75px">No</th>
		<th>Nama Kontingen</th>
		<th width="150px" style="background-color: gold;">Emas</th>
		<th width="150px" style="background-color: silver;">Perak</th>
		<th width="150px" style="background-color: #cd7f32;">Perunggu</th>
	</tfoot>
</table>

<?= Html::a('Kembali', ['/event/view', 'id' => $_GET['ev']], ['class'=>'btn btn-primary']); ?>
<!-- script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script> -->