<div class="panel panel-default" id="panel"> 
<div class="panel-heading"> Data Pegawai</div>
<div class="panel-body">


<table class="table table-bordered table-hover table-striped cell-border" id="example1">

<thead>
     <tr style="background: #dcdcdc">
		<th> <p> Nama Lengkap</th> </p>
		<th> <p> Jenis Kelamin </p></th>
		<th> <p> Alamat </p></th>
		<th> <p> No Telepon </p></th>
		<th> <p> Jabatan</th> </p>
		<th> <p> Username</th> </p>
		<th> <p> Password</th> </p>
	
		<th> <p> Aksi</th> </p>
	</tr>
</thead>
	
	<tr>
	<?php 
	foreach ($record->result() as $d) 
	{ 
		echo "<tr>
		
		<td>$d->nama_peg</td>
		<td>$d->JK</td>
		<td>$d->alamat</td>
		<td>$d->no_telp</td>
		<td>$d->jabatan</td>
		<td>$d->username</td>
		<td>$d->password</td>


		<td>".anchor('Pengguna/edit/'.$d->Id_peg,'Ubah', array('class'=> 'btn btn-primary'))." "
		.anchor('Pengguna/delete/'.$d->Id_peg,'Hapus',array('class'=> 'btn btn-danger'))." </td>
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
						<h4 class="modal-title">Tambah Data Pengguna</h4>
					</div>
					<div class="modal-body">
			
<?php
echo form_open('Pegawai/post', "name='modal_popup'");
?>
<table class="table table-bordered">
	<tr>
		<td> Nama Pegawai </td>
		<td> <input type="text" class="form-control" name="nama_peg" placeholder="Nama Pegawai" required></td>
	</tr>

	<tr>
		<td> Jenis Kelamin </td>
		<td> <input type="text" class="form-control" name="JK" placeholder="Jenis Kelamin"></td>
	</tr>

	<tr>
		<td> Alamat </td>
		<td> <input type="text" class="form-control" name="alamat" placeholder="Alamat"></td>
	</tr>

	<tr>
		<td> Nomor Telepon </td>
		<td> <input type="text" class="form-control" name="no_telp" placeholder="Nomor Telepon/HP"></td>
	</tr>

	<tr>
		<td> Jabatan </td>
		<td> <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" required=""></td>
	</tr>
	
	<tr>
		<td> Username </td>
		<td> <input type="text" class="form-control" name="username" placeholder="Username" required=""></td>
	</tr>

	<tr>
		<td> Password </td>
		<td> <input type="password" class="form-control"  name="password" placeholder="Password" required=""></td>
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