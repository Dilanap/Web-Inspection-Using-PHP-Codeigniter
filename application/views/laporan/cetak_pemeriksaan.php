<script type="text/javascript">
	window.print();
</script>
 <br>
            <div align="left">
			<table border=0 width="100%">
			<tr>
			<td>
                <img id="logo-header" src="<?php echo base_url();?>images/gambar1.png" height="100" width="100">
				</td>
				<td align=right>PT Hino Motors Manufacturing Indonesia<br>
				 Kawasan Industri Kota Bukit Indah, Jl. Damar, Blok D1 No.1, <br>Dangdeur, Purwakarta, Kabupaten Purwakarta, Jawa Barat 41181 <br>
				Phone: 62(21)4605925 
				Fax: 62(21)4605924</TD>
				</table>
                 </div>
        <br>
		<hr>
<!--<h3>Sold To</h3>
<h5><?php echo $record2['alamat'] ?></h5>
<h5>Kp.Legon Kel. Jatimulya Kec. Tambun Selatan. Kab. Bekasi</h5>-->
<p> Tanggal Cetak <?php echo date('Y-m-d'); ?></p>
<h3 align="center">LAPORAN PEMERIKSAAN <h3>

<table border="1px" cellspacing="2" cellpadding="1" width="100%" >
     <thead>
     <tr >
			 <th style= "text-align:center"> <p> No</th> </p>
		    <th style= "text-align:center"> <p> Item Check</th> </p> 
		   <th style= "text-align:center"> <p> Jumlah</th> </p>
           <th style= "text-align:center"> <p> Standar Item</th> </p>
          <th style= "text-align:center"> <p> Metode</th> </p> 
         <th style= "text-align:center"> <p> Remark</th> </p> 
           <th style= "text-align:center"> <p>Tanggal Pengecekkan</th> </p>  
          
     </tr>
     </thead>
         <?php 
	if ($record->result()) {
	    $no = 1;
		foreach ($record->result() as $d) 
		{ 
			echo "<tr align ='center'>
			<td>$no</td>
			<td>$d->nama_part</td>
			<td>$d->jumlah</td>
			<td>$d->st_item</td>
			<td>$d->metode</td>	
			<td>$d->remark</td>
			<td>$d->tgl_check</td>
					
			</tr>";
		$no++;
		}     	
    	}
     ?>
</table>    
<table>
	<tr height="200">
		<td align="center"> Dicetak Oleh </td>
	</tr>
	<tr>
		<td align="center">Department Head</td>
	</tr>
	</table>
</div>
</div>
</div>