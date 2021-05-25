<div class="panel panel-default" id="panel"> 
<div class="panel-heading"> Data Pelanggan</div>
<div class="panel-body">


<table class="table table-bordered table-hover table-striped cell-border" id="example1">

<thead>
     <tr style="background: #dcdcdc">
		<th> <p> ID Perusahaan</th> </p>
		<th> <p> Nama Perusahaan</th> </p>
		<th> <p> Alamat </p></th>
		<th> <p> Email</th> </p>
		<th> <p> Telepon</th> </p>
		<th> <p> Aksi</th> </p>
	</tr>
</thead>
	
	<tr>
	<?php 
	foreach ($record->result() as $d) 
	{ 
		echo "<tr>
		
		<td>$d->id_pengguna</td>
		<td>$d->nama_lengkap</td>
		<td>$d->alamat</td>
		<td>$d->email</td>
		<td>$d->telp</td>

		<td>".anchor('Pelanggan/edit/'.$d->id_pengguna,'Ubah', array('class'=> 'btn btn-primary'))." "
		.anchor('Pelanggan/delete/'.$d->id_pengguna,'Hapus',array('class'=> 'btn btn-danger'))." </td>
		</tr>";

	}
	?>
	<div class="col-md-12" style="text-align:left; margin-bottom: 10px; margin-top: -5px; ">

<!--<button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"> Tambah Data</button>-->
	</div>
	 
</table>



</div>

<!-- ini modal -->
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
	
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Data Pelanggan</h4>
					</div>
					<div class="modal-body">
			
<?php
echo form_open('Pelanggan/post', "name='modal_popup'");
?>
<table class="table table-bordered">
	<tr>
		<td> ID Pelanggan </td>
		<td> <input type="text" class="form-control" name="id_pengguna" placeholder="ID Pelanggan" required></td>
	</tr>
	<tr>
		<td> Nama Perusahaan </td>
		<td> <input type="text" class="form-control" name="nama_perusahaan" placeholder="Nama Perusahann" required></td>
	</tr>

	<tr>
		<td> Alamat </td>
		<td> <input type="text" class="form-control" name="alamat" placeholder="Alamat"></td>
	</tr>

	<tr>
		<td> Email </td>
		<td> <input type="text" class="form-control" name="email" placeholder="Email" required=""></td>
	</tr>

	<tr>
		<td> Telepon </td>
		<td> <input type="text" class="form-control"  name="telp" placeholder="Telepon" required=""></td>
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