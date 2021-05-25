<div class="panel panel-default" id="panel"> 
<div class="panel-heading"> Data Jadwal Pemeriksaan</div>
<div class="panel-body">


<table class="table table-bordered table-hover table-striped cell-border" id="example1">

<thead>
     <tr style="background: #dcdcdc">
 	 <th> <p> Kode Jadwal</th> </p> 
		<th> <p> Type Unit</th> </p> 
		<th> <p>Sequence </p></th> 
		<th> <p> No Chasis</th> </p>
		<th> <p> Warna</th> </p>
		<th> <p> Aksi</th> </p>
	</tr>
</thead>
	
	<tr>
	<?php 
	foreach ($record->result() as $d) 
	{ 
		echo "<tr>
		<td>$d->Id_jadwal</td>
		<td>$d->type_unit</td>
		<td>$d->sequence</td>
		<td>$d->no_chasis</td>
		<td>$d->warna</td>
		

		<td>".anchor('Jadwal1/edit/'.$d->Id_jadwal,'Ubah', array('class'=> 'btn btn-primary'))." " 
		.anchor('Jadwal1/delete/'.$d->Id_jadwal,'Hapus',array('class'=> 'btn btn-danger'))." </td>
		</tr>";

	}
	?>
	<div class="col-md-12" style="text-align:left; margin-bottom: 10px; margin-top: -5px; ">

<button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"> Tambah Data</button> 
	</div>
	 
</table>

</div>

<!-- ini modal -->
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
	
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Data Jadwal</h4> 
					</div>
					<div class="modal-body">
			
<?php
echo form_open('Jadwal1/post', "name='modal_popup'"); 
?>
<table class="table table-bordered">
<tr>
		<td> Kode Jadwal </td> 
		<td> <input type="text" class="form-control" name="Id_jadwal" placeholder="Id_jadwal" required></td>
	</tr>

	<tr>
		<td> Type Unit </td> 
		<td> <input type="text" class="form-control" name="type_unit" placeholder="type_unit" required></td>
	</tr>

	<tr>
		<td> Sequence </td> 
		<td> <input type="text" class="form-control" name="sequence" placeholder="sequence"></td>
	</tr>

	<tr>
		<td> No Chasis </td> 
		<td> <input type="text" class="form-control" name="no_chasis" placeholder="no_chasis" required=""></td>
	</tr>

	<tr>
		<td> Warna </td>
		<td> <input type="text" class="form-control"  name="warna" placeholder="warna" required=""></td>
	</tr>

	<tr>
		<td colspan="2">
	<button type="submit" class ="btn btn-primary" name="submit">Simpan</button>
	</td>
	</tr>
</table>  
</form>
</div>
</div>
				</div>
				</div>