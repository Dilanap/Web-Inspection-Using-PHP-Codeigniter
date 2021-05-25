<h3> Edit Data Pengguna </h3>

<?php 
echo form_open ('Pegawai/edit');
?>

<table class="table table-bordered">	
	<tr>
		<td colspan="2"> <input type="hidden" class="form-control" name="Id_peg" value="<?php echo $record['Id_peg']?>" placeholder="Id Pegawai"></td>
	</tr>

	<tr>
		<td>Nama Lengkap</td>
		<td> <input type="text" class="form-control" name="nama_peg" value="<?php echo $record['nama_peg']?>" placeholder="Nama Lengkap"></td>
	</tr>
	
	<tr>
		<td>Jenis Kelamin</td>
		<td> <input type="text" class="form-control" name="JK" value="<?php echo $record['JK']?>" placeholder="Jenis Kelamin"></td>
	</tr>

	<tr>
		<td>Alamat</td>
		<td> <input type="text" class="form-control" name="alamat" value="<?php echo $record['alamat']?>" placeholder="Alamat"></td>
	</tr>

	<tr>
		<td>Nomor Telepon/HP</td>
		<td> <input type="text" class="form-control" name="no_telp" value="<?php echo $record['no_telp']?>" placeholder="Nomor Telepon/HP"></td>
	</tr>
	
	<tr>
		<td>Jabatan</td>
		<td> <input type="text" class="form-control" name="jabatan" value="<?php echo $record['jabatan']?>" placeholder="Jabatan"></td>
	</tr>
	<tr>
		<td>Username</td>
		<td> <input type="text" class="form-control" name="username" value="<?php echo $record['username']?>" placeholder="Username"></td>
	</tr>
	
	<tr>
		<td>Password</td>
		<td> <input type="password" class="form-control" name="password" value="<?php echo $record['password']?>" placeholder="Password"></td>
	</tr>


	<tr>
		<td colspan="2"> <button type="submit" class ="btn btn-primary"  name="submit">Simpan</button></td>
	</tr>
</table>
</form>