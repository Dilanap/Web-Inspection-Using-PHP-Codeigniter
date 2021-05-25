<h3>Laporan Pengiriman</h3> 
<hr>
<?php
echo form_open('Laporan/pengiriman');
?>
<input type="hidden" name="kode" value="">
<table class="table table-bordered">
     <tr>
          <td>Bulan</td>
          <td>
          	<select name="bulan" class="form-control">
          		<option value="1">Januari</option>
				<option value="2">Pebruari</option>
				<option value="3">Maret</option>
				<option value="4">April</option>
				<option value="5">Mei</option>
				<option value="6">Juni</option>
				<option value="7">Juli</option>
				<option value="8">Agustus</option>
				<option value="9">September</option>
				<option value="10">Oktober</option>
				<option value="11">November</option>
				<option value="12">Desember</option>
          	</select>
          </td>
     </tr>
	<tr>
		<td>Tahun</td>
		<td>			
			<select name="tahun" class="form-control" style="width: 200px">
			   <?php 
			    $tahun = date('Y');
			    $batas = $tahun - 3;
			   	for ($i=$tahun; $i > $batas; $i--) { 
			   		echo "<option>$i</option>";
			   	}
			   ?>
			</select>
		</td>
	</tr>
     <tr>
     <td></td>
     <td> <button type="submit" class ="btn btn-primary" name="submit">Lihat Data</button>
     </td>
     </tr>
</table>  
</form>
<a href='<?php echo site_url();?>/laporan/cetakpengiriman/<?php echo $bulan ?>/<?php echo $tahun ?>' target ="_blank">Cetak</a>
<table  class="table table-bordered" cellspacing="0" width="100%">
     <thead>
     <tr style="background: #dcdcdc">
          <th> <p> No</th> </p>
		   <th> <p> ID Pelanggan</th> </p>
		   <th> <p> Nama Pelanggan</th> </p>
          <th> <p> ID PO</th> </p>          
          <th> <p> ID DO</th> </p>
          <th> <p> ID PL</th> </p>
          <th> <p> Tanggal Kirim</th> </p>
          <!--<th> <p> Tanggal</th> </p>          
          <th> <p> Jumlah</th> </p>
          <th> <p> Satuan</th> </p>
          <th> <p> Keterangan</th> </p>    -->      
     </tr>
     </thead>
         <?php 
	if ($record->result()) {
	    $no = 1;
		foreach ($record->result() as $d) 
		{ 
			echo "<tr>
			<td>$no</td>
			<td>$d->id_pengguna</td>
			<td>$d->nama_lengkap</td>
			<td>$d->id_po</td>
			<td>$d->id_do</td>
			<td>$d->id_pl</td>			
			<td>$d->tgl_kirim</td>
			
					
			</tr>";
		$no++;
		}     	
    	}else {
		echo "<tr><td colspan = '7' align = 'center'>No records</td></tr>";
	  }
     ?>
</table>    
</div>
</div>
</div>
</div>