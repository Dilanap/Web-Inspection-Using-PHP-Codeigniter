<h3> Edit Data Jadwal </h3>

<?php 
echo form_open ('Jadwal1/edit');
?>

<table class="table table-bordered">	
	<tr>
		<td colspan="2"> <input type="hidden" class="form-control" name="Id_jadwal"value="<?php echo $record['Id_jadwal']?>" placeholder="Id_jadwal"></td>
	</tr>
	<tr>
		<td>Kode Jadwal</td>
		<td> <input type="text" class="form-control" name="Id_jadwal" value="<?php echo $record['Id_jadwal']?>" placeholder="type_unit"></td>
	</tr>
	<tr>
		<td>Type Unit</td>
		<td> <input type="text" class="form-control" name="type_unit" value="<?php echo $record['type_unit']?>" placeholder="type_unit"></td>
	</tr>
	
	<tr>
		<td>Sequence</td>
		<td> <input type="text" class="form-control" name="sequence" value="<?php echo $record['sequence']?>" placeholder="sequence"></td>
	</tr>
	
	<tr>
		<td>Nomer Chasis</td>
		<td> <input type="text" class="form-control" name="no_chasis" value="<?php echo $record['no_chasis']?>" placeholder="no_chasis"></td>
	</tr>
	
	<tr>
		<td>Warna</td>
		<td> <input type="text" class="form-control" name="warna"value="<?php echo $record['warna']?>" placeholder="Password"></td>
	</tr>

	<tr>
		<td colspan="2"> <button type="submit" class ="btn btn-primary"  name="submit">Simpan</button></td>
	</tr>
</table>
</form>