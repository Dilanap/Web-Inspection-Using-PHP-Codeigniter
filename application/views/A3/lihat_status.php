<div class="panel panel-default" id="panel"> 
<div class="panel-heading"> Data A3 report</div>
<div class="panel-body">


<table  class="table table-bordered" cellspacing="0" width="100%" id="example1">
	<thead>
	<tr style="background: #dcdcdc">
		 <th> <p> Tema</th> </p> 
		<th> <p>Problem Statement</th> </p> 
		<th> <p> Aliran Proses</th> </p>
		<th> <p> Target</th> </p>
		<th> <p> Implementasi</th> </p>
       <th> <p> Yokoten</th> </p>
		
		<th> <p> Status</th> </p>
		<th width="130px"> <p> Aksi</th> </p>
	</tr>
	</thead>
	
	<tr>
	<?php 
	foreach ($record->result() as $d) 
	{ 
		echo "<tr>		
		<<td>$d->tema</td>
		<td>$d->problem_statement</td>
		<td>$d->aliran_proses</td>
        <td>$d->target</td>
        <td>$d->implementasi</td>
		<td>$d->yokoten</td>
		<td>$d->status</td>		
		<td>
		
		".anchor('pl/tampil_detail/'.$d->Id_a3report,'Detail', array('class'=> 'btn btn-default'))." 
		".($d->status == 'Tervalidasi'? anchor('pl/cetak_pl/'.$d->Id_a3report,'Cetak' , array('class'=> 'btn btn-success')) : '')."
		

		</tr>";
	}
	?>
	

</table>
		</div>
	 </div>
</table>
</form>
</div>
</div>
</div>
				</div>