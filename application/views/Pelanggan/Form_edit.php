 <h3> Edit Data Pelanggan </h3>

<?php 
echo form_open ('Pelanggan/edit');
?>

<table class="table table-bordered">	
	<tr>
		<td colspan="2"> <input type="hidden" class="form-control" name="id_pengguna" value="<?php echo $record['id_pengguna']?>" placeholder="Id Pelanggan"></td>
	</tr>

	<tr>
		<td>Nama Perusahaan</td>
		<td> <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $record['nama_lengkap']?>" placeholder="Nama Perusahaan"></td>
	</tr>
	
	<tr>
		<td>Alamat</td>
		<td> <input type="text" class="form-control" name="alamat" value="<?php echo $record['alamat']?>" placeholder="Alamat"></td>
	</tr>
	
	<tr>
		<td>Email</td>
		<td> <input type="text" class="form-control" name="email" value="<?php echo $record['email']?>" placeholder="Email"></td>
	</tr>
	
	<tr>
		<td>Telp</td>
		<td> <input type="telp" class="form-control" name="telp" value="<?php echo $record['telp']?>" placeholder="telp"></td>
	</tr>

	

	<tr>
		<td colspan="2"> <button type="submit" class ="btn btn-primary"  name="submit">Simpan</button></td>
	</tr>
</table>
</form>