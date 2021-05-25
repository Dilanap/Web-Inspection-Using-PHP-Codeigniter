<div class="panel panel-default" id="panel"> 
<div class="panel-heading"> Data Check Sheet Inspection</div>
<div class="panel-body">
<button class="btn btn-danger btn-xs" type="button" data-target="#ModalAdd" data-toggle="modal"> Cek Jumlah Rejeck</button>

<table  class="table table-bordered" cellspacing="0" width="100%" id="example1">
	<thead>
	<tr style="background: #dcdcdc">
		<th> <p> ID Check</th> </p>
		<th> <p> Tanggal Check</th> </p>
		<th> <p> Part Name</th> </p>
		<th> <p> Jumlah</th> </p>
		<th> <p> Remark</th> </p>
		
		<th width="130px"> <p> Aksi</th> </p>
	</tr>
	</thead>
	
	<tr>
	<?php 
	foreach ($record->result() as $d) 
	{ 
		echo "<tr>		
		<td>$d->Id_check</td>
		<td>$d->tgl_check</td>
		<td>$d->nama_part</td>
		<td>$d->jumlah</td>
		<td>$d->remark</td>
		
		<td>
		".anchor('Cs/hapuscs/'.$d->Id_detailcs.'/'.$d->Id_check,'Hapus', array('class'=> 'btn btn-danger','onclick' => "return confirm('Anda ingin menghapus data ini ?')"))."		
		".anchor('Po/tampil_detail1/'.$d->Id_check,'Detail', array('class'=> 'btn btn-default'))."

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

