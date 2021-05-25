<h3> Edit Data Jadwal </h3>

<?php 
echo form_open ('Checksheet/update');
?>

<table class="table table-bordered">	
	<tr>
		<td colspan="2"> <input type="hidden" class="form-control" name="Id_rincian"value="<?php echo $record['Id_rincian']?>" placeholder="Id_rincian" readonly></td>
	</tr>
	<tr>
		<td>Kode rincian</td>
		<td> <input type="text" class="form-control" name="Id_rincian" value="<?php echo $record['Id_rincian']?>" placeholder="Id_rincian" readonly></td>
	</tr>
	<tr>
		<td>Rincian Kerusakan</td>
		<td> <input type="text" class="form-control" name="rincian_kerusakan" value="<?php echo $record['rincian_kerusakan']?>" placeholder="type_unit" readonly></td>
	</tr>
	
	<tr>
		<td>penyebab</td>
		<td> <input type="text" class="form-control" name="penyebab" value="<?php echo $record['penyebab']?>" placeholder="penyebab" readonly></td>
	</tr>
	
	<tr>
		<td>Tanggal Ditemukan Masalah</td>
		<td> <input type="text" class="form-control" name="tgl_masalah" value="<?php echo $record['tgl_masalah']?>" placeholder="tgl_masalah" readonly></td>
	</tr>
	
	<tr>
		<td>tindakan</td>
		<td> <input type="text" class="form-control" name="tindakan"value="<?php echo $record['tindakan']?>" placeholder="tindakan" ></td>
	</tr>
	<tr>
		<td>tanggal Selesai</td>
		<td> <input type="text" class="form-control" name="tgl_selesai"value="<?php echo date('Y-m-d');?>" readonly></td>
	</tr>
	<tr>
		<td>validasi</td>
		<td> <input type="text" class="form-control" name="tgl_verifikasi"value="<?php echo $record['tgl_verifikasi']?>" placeholder="validasi" readonly></td>
	</tr>

	<tr>
		<td colspan="2"> <button type="submit" class ="btn btn-primary"  name="submit">Simpan</button></td>
	</tr>
</table>
</form>