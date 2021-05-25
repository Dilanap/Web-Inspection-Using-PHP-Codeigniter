<div class="panel-heading" style="background: #dcdcdc">
    <h3>Check Sheet Inspection</h3> 
</div>

<?php
$konek = mysqli_connect("localhost","root","");
 mysqli_select_db($konek ,"pemeriksaan");
$result = mysqli_query( $konek, "select * from part") or die("Couldn't Create Database: $dbname");
$jsArray = "var jumlah= new Array();\n";
$jsArray1 = "var st_item = new Array();\n";
$jsArray2 = "var metode = new Array();\n";
echo form_open('Cs');
?>
<input type="hidden" name="kode" value="">
<table class="table table-bordered">

<tr>
          <td>Unit Colour</td>
		  <td>Check Number</td>
          <td>Item Check</td>
          <td>Qty</td>
          <td>Standard</td>
          <td>Method</td>
          <td>Remark</td> </tr>
         
         <tr> <td>
               <select name="Id_jadwal" id="Id_jadwal" class="form-control">
               <?php
               foreach ($jadwal as $k) {
                    echo "<option value= '$k->Id_jadwal'>$k->warna </option>";
               }
               ?>
               </select>
          </td>
		  <td>
               <select class="form-control" name="tb_inspeksi" id="tb_inspeksi" required>
				    	<option value="">No Selected</option>
				    	<?php foreach($tb_inspeksi as $row):?>
				    	<option value="<?php echo $row->id;?>"><?php echo $row->inspeksi;?></option>
				    	<?php endforeach;?>
				    </select>
          </td>
   <td>
               <select name="Id_part" class="form-control" onchange="changeValue(this.value), changeValue1(this.value), changeValue2(this.value)">
   		<option selected="selected">-------</option>
<?php
	
		while ($row = mysqli_fetch_array($result)) {
    	echo '<option value="' . $row['Id_part'] . '">' . $row['nama_part'] . '</option>';
    	$jsArray .= "jumlah['" . $row['Id_part'] . "'] = {satu:'" . addslashes($row['jumlah']) . "'};\n";
		$jsArray1 .= "st_item['" . $row['Id_part'] . "'] = {satu:'" . addslashes($row['st_item']) . "'};\n";
		$jsArray2 .= "metode['" . $row['Id_part'] . "'] = {satu:'" . addslashes($row['metode']) . "'};\n";
}
?>
</select>
          </td>
		<td>     <input type="text" class="form-control"  name="jumlah" id="jumlah"placeholder="jumlah" readonly >
	
          </td>
          <td> <input type="text" class="form-control" name="st_item" id="st_item"placeholder="Standar Item"  readonly ></td>
        
         <td>     <input type="text" class="form-control"  name="metode" id="metode" placeholder="method" readonly> 
          </td>
     
          <td>
              <input type="radio" name="remark" placeholder="Remark" value = "OK"> OK </td>
			<td>  <input type="radio" name="remark" placeholder="Remark" value = "NG"> NG
          </td>
     </tr>
	 
     <tr>
     <td colspan="2"> <button type="submit" class ="btn btn-primary" name="submit">Submit</button></td>
     </tr>
</table>  
</form>


<table  class="table table-bordered" cellspacing="0" width="100%">
     <thead>
          <tr style="background: #dcdcdc">   
          <th class="" colspan="8">Data Check Inspection</th>   
     </tr>
	  

     <tr>
          <th> <p> No</th> </p>
		  <th> <p>Unit Colour</th> </p>
          <th> <p> Item Check</th> </p>
          <th> <p> Qty</th> </p>
		  <th> <p> Standard</th> </p>
          <th> <p> Method</th> </p>
		  <th> <p> Remark</th> </p>          
          <th width="130px"> <p> Aksi</th> </p>
     </tr>
     </thead>
     
     <tr>
     <?php 
     $no = 1;
     foreach ($detail->result() as $d) 
     { 
          echo "<tr>
          <td>$no.</td>
          <td>$d->warna</td>
		  <td>$d->nama_part</td>
          <td>$d->jumlah</td>
		  <td>$d->st_item</td>
          <td>$d->metode</td> 
		  <td>$d->remark</td> 
          <td>"
          .anchor('cs/hapusitem/'.$d->Id_detailcs,'Hapus',array('class'=> 'btn btn-danger'))." </td>
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

     <!-- ini modal -->
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Simpan Check Sheet</h4>
			</div>
			<div class="modal-body">
			<?php
			echo form_open('Cs/selesai');
			?>
			<table class="table table-bordered">	
					<tr>
          <td>Id Pegawai</td>
          <td> <input type="text" class="form-control" name="Id_peg" placeholder="id_pengguna" 
		  value="<?php echo $this->session->userdata('Id_peg'); ?>"required readonly/></td>
     
	 </tr>
					<tr>

					<td  ><button class="btn btn-primary" type="submit" name="submit" > Kirim Check Sheet</button> </td>
				<td></td>		
				</tr>
			</table>
			</form>
	
			</div>

     <!--<?php 

     echo 
     "<tr>
     <td>"

     .anchor('po/selesai','Kirim Po', array('class'=>'btn btn-success', 'onclick' => "return confirm ('Apakah data sudah benar untuk disimpan ?')"))."
     </td>

     </tr>"
	 
     ;?>-->
	 <script src="bootstrap/js/bootstrap.min.js"></script>
	 <script type="text/javascript">
<?php echo $jsArray; ?>
function changeValue(id){
document.getElementById('jumlah').value = jumlah[id].satu;
};
<?php echo $jsArray1; ?>
function changeValue1(id){
document.getElementById('st_item').value = st_item[id].satu;
};
<?php echo $jsArray2; ?>
function changeValue2(id){
document.getElementById('metode').value = metode[id].satu;
};
</script>
<script type="text/javascript">
		$(document).ready(function(){

			$('#tb_inspeksi').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('cs/inspeksi_d');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].Id_part+'>'+data[i].nama_part+'</option>';
                        }
                        $('#part').html(html);

                    }
                });
                return false;
            }); 
            
		});
				</script>
</div>
</div>
</div>
</div>