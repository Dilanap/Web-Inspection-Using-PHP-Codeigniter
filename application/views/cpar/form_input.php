<!-- DataTales Example -->
<h1>Form Permintaan Tindakan Perbaikan dan Pencegahan</h1>
<div class="col-lg-6">
<table class="table table-bordered table-hover table-striped cell-border">
	<tr style="background: #dcdcdc" >
		<td> Id Check</td>
		<td><?php echo $record2['Id_check'] ?></td>
	</tr>	
<tr style="background: #dcdcdc">
		<td > Part NG</td>
		<td> <?php echo $record2['nama_part'] ?></td>
</tr>
</table>
</div>
<?php

echo form_open('Cpar/submit_cpar');
?>
<input type="hidden" name="kode" value="">
<table class="table table-bordered">
	 <tr>
          <td>Id_rincian</td>
          <td> <input type="text" class="form-control" name="Id_rincian" VALUE = "<?php echo $kode; ?>" readonly/></td>
     </tr>
        <input type="hidden" class="form-control" name="Id_detailcs" VALUE = "<?php echo $record2['Id_detailcs']; ?>" readonly/>

     <tr>
         <td>Dikeluarkan sehubungan dengan : </td>
          <td>
               <input type="radio" name="Id_reason" value = "RSN-001" /> External Complain <BR>
               <input type="radio" name="Id_reason" value = "RSN-002" /> Internal Audit <BR>
               <input type="radio" name="Id_reason" value = "RSN-003" /> Peformance Produk <BR>
               <input type="radio" name="Id_reason" value = "RSN-004" /> Peformance Mesin <BR>
               <input type="radio" name="Id_reason" value = "RSN-005" /> Peformance Lingkungan Safety <BR>
          </td>
     </tr>

     <tr>
          <td>Rincian Ketidaksesuaian</td>
          <td> <input type="text" class="form-control" name="rincian_kerusakan" placeholder="Rincian Ketidaksesuaian" /></td>
     </tr>
	 
	  <tr>
          <td>Penyebab</td>
          <td>
              <input type="text" class="form-control"  name="penyebab" placeholder="Penyebab">
          </td>
     </tr>

	<tr>
          <td>Tanggal Ditemukan Masalah</td>
          <td> <input type="date" class="form-control"  name="tgl_masalah" placeholder="Tanggal Merakit"></td>
     </tr>
    
     <tr>
     <td colspan="2"> <button type="submit" class ="btn btn-primary" name="submit">Submit</button></td>
     </tr>
</table>  
</form>


 



