<div class="panel-heading" style="background: #dcdcdc">
    <h3>Form Input Jarak Relative</h3> 
</div>

<?php

echo form_open('Pelanggan/simpan');
?>

<div class="col-md-12">

<table class="table table-bordered">
<tr>
		<td>ID Pemilihan Jalur</td>
		<td> <input type="text" class="form-control" name="id_pj" value="<?php echo $kode; ?>" 
		readonly/> </td>
	</tr>
	<tr>
			<td width="20%">Nama Perusahaan</td>
		    <td>
               <select name="id_pelanggan" id="id_pelanggan" class="form-control">
               <?php
               foreach ($pelanggan as $k) {
                    echo "<option value= '$k->id_pelanggan'>$k->nama_perusahaan </option>";
               }
               ?>
               </select>
			</td>       
		</tr>
	<tr>
	<td>Lintang x</td>
	<td><input class = "form-control" type="text" name="lintang_x" placeholder="lintang_x" required /></td>
	</tr>

	<tr>
	<td>Bujur x</td>
	<td><input class = "form-control" type="text" name="bujur_x" placeholder="bujur_x" required /></td>
	</tr>
	
	<tr>
	<td>Lintang y</td>
	<td><input class = "form-control" type="text" name="lintang_y" placeholder="lintang_y" required /></td>
	</tr>

	<tr>
	<td>Bujur y</td>
	<td><input class = "form-control" type="text" name="bujur_y" placeholder="bujur_y" required /></td>
	</tr>
	
	<tr>
	<td>Lintang z</td>
	<td><input class = "form-control" type="text" name="lintang_z" placeholder="lintang_z" required /></td>
	</tr>

	<tr>
	<td>Bujur z</td>
	<td><input class = "form-control" type="text" name="bujur_z" placeholder="bujur_z" required /></td>
	</tr>
	<!--<tr>
	<td>Jam</td>
	<td> <input type="text" class="form-control" name="jam" placeholder="jam"></td>
	</tr> 
	-->
	
	<tr>
	<td  colspan="2"><button class="btn btn-primary" type="submit" name="submit"> Tambah Data</button> 
	</td>	
	</tr>

</table>
</form>
</div>

<div class="col-md-12">
	<table class="table table-bordered table-hover dataTable" border="1">	
		<tr style="background: #dcdcdc">	
			<th class="" colspan="7">Data Jarak Relative</th>	
		</tr>
		<tr>
			<th>No</th>
			<th>Nama Perusahaan</th>
			<th>Lintang X</th>
			<th>Bujur X</th>
			<th>Lintang Y</th>
			<th>Bujur Y</th>
			<th>Lintang Z</th>
			<th>Bujur Z</th>
			<th>Aksi</th>
		</tr>


		<?php 
		$no = 1;
		foreach ($detail->result() as $d) 
		{ 
			echo "<tr>
			<td>$no</td>
			<td>$d->nama_perusahaan</td>
			<td>$d->lintang_x</td>
			<td>$d->bujur_x</td>
			<td>$d->lintang_y</td>
			<td>$d->bujur_y</td>
			<td>$d->lintang_z</td>
			<td>$d->bujur_z</td>
			<td>"
			.anchor('Pengiriman/hapusitem/'.$d->id_pj,'Hapus',array('class'=> 'btn btn-danger'))." 
			</td>
			</tr>";
			$no++;
		}
		?>
		<tr>
			<td colspan="4">
			  <button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"> Selesai Input</button> 
			</td>
		</tr>
	</table>
</div>

<!-- ini modal -->
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Simpan Pemilihan Jalur</h4>
			</div>
			<div class="modal-body">
			<?php
			echo form_open('Pengiriman/selesai');
			?>
			<table class="table table-bordered">	
					<tr > 
						<td width="20%">Id Pengiriman</td>
						 <td><input class="form-control" type="text" name="id_pengiriman" placeholder="Id Pengiriman" > </td>
					</tr>
					<tr > 
						<td width="20%">No Packing List</td>
						 <td><input class="form-control" type="text" name="id_pl" placeholder="No Packing List"> </td>
					</tr>
			
<tr > 
						<td width="20%">Tanggal Kirim</td>
						 <td><input class="form-control" type="date" name="tgl_kirim" placeholder="Tanggal Kirim"> </td>
					</tr>
						
				<tr>

					<td  ><button class="btn btn-primary" type="submit" name="submit" > Simpan</button> </td>
				<td></td>		
				</tr>

			</table>
			</form>
	
			</div>
		</div>
	</div>
</div>