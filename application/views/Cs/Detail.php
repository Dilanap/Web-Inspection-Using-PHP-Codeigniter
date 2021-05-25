<h3> Detail Data Pembelian Barang Jadi </h3>
<div class="col-lg-6">
<table class="table table-bordered table-hover table-striped cell-border">
	<tr style="background: #dcdcdc" >
		<tr style="background: #dcdcdc">
		<td > Tanggal Pengecekkan</td>
		<td> <?php echo $record3['tgl_check'] ?></td>
		</tr>
		<tr style="background: #dcdcdc">

</tr>
		
		</tr>
	</tr>	
	<!--<tr style="background: #dcdcdc" >
		<td> Id DO</td>
		<td><?php echo $kode ?></td>
	</tr>	-->
	<tr style="background: #dcdcdc" >
		<td> Id jadwal</td>
		<td><?php echo $record2['Id_jadwal'] ?></td>
	</tr>	
<tr style="background: #dcdcdc">
		<td > ID PO</td>
		<td> <?php echo $record3['Id_check'] ?></td>
</tr>
<tr style="background: #dcdcdc">
		<td > Id Pelanggan</td>
		<td> <?php echo $record3['Id_peg'] ?></td>
</tr>

	

</table>
</div>
<?php
			echo form_open('PR/penolakan');
// var_dump($jsArray);
			?>
<div>
<table class="table table-bordered table-hover table-striped cell-border">

<td >No</td>
<td >Variant Product</td>
<td >Part Code</td>
<td >Order Qty</td>
<td >D</td>
<td >P</td>
<td >Period</td>




<?php 

$no = 1;

	foreach ($record as $d) 
	{ 
		echo "<tr>
		<td>$no</td>
		<td>$d->variant_p</td>
		<td>$d->part_code</td>
		<td>$d->jumlah</td>
		<td>$d->design</td>
		<td>$d->package</td>
		<td>$d->period</td>
		
	
		
		</tr>";
$no++;
	}
	?>
	<!--<td ><button class="btn btn-primary" type="submit" name="submit" >Tolak PO</button> </td>-->
</table>
</div>