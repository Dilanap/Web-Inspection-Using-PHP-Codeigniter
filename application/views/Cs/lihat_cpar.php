<div class="panel panel-default" id="panel"> 
<div class="panel-heading"> Data Check Sheet Inspection</div>
<div class="panel-body">
<button class="btn btn-danger btn-xs" type="button" data-target="#ModalAdd" data-toggle="modal"> Cek Jumlah Rejeck</button>

<table  class="table table-bordered" cellspacing="0" width="100%" id="example1">
	<thead>
	<tr style="background: #dcdcdc">
		<th> <p> ID Check</th> </p>
		<th> <p> Status</th> </p>
		<th width="130px"> <p> Aksi</th> </p>
	</tr>
	</thead>
	
	<tr>
	<?php 
	foreach ($record->result() as $d) 
	{ 
		echo "<tr>		
		<td>$d->Id_check</td>
		<td>".($d->status == 'Sudah Diproses'? $d->status : $d->status)."</td>		
		<td>
		".anchor('Cs/hapuscs/'.$d->Id_detailcs.'/'.$d->Id_check,'Hapus', array('class'=> 'btn btn-danger','onclick' => "return confirm('Anda ingin menghapus data ini ?')"))."		
		".anchor('Cpar/tambah_cpar/'.$d->Id_check,'Perbaiki', array('class'=> 'btn btn-default'))."

		</tr>";
	}
	?>

 
	 
</table>

</div>

</div>

<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Data Part OK/NG</h4>
			</div>
			<div class="modal-body">	
				<table  class="table table-bordered" cellspacing="0" width="100%" id="example1">
				<thead>
					<tr style="background: #dcdcdc">
						<th> <p> Nama Part</th> </p>
						<th> <p> Jumlah NG</th> </p>
						<th> <p> Total NG</th> </p>
					</tr>
					</thead>
						<tr>
										<?php 
								if($total)
										{
										 foreach ($total as $d) 
										{ 
										?>
										<tr>
										<td><?php echo $d->nama_part ?></td>
										<td><?php echo $d->total ?></td>
										<td><?php echo $d->total_ng ?></td>
										</tr>
										<?php
										}
										}
								?>
						</tr>
				</table>
			</div>
		</div>
	</div>
</div>

