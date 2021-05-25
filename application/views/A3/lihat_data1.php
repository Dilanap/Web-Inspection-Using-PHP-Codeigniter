<div class="panel panel-default" id="panel"> 
<div class="panel-heading"> Data A3 Report</div>
<div class="panel-body">


<table class="table table-bordered table-hover table-striped cell-border" id="example1">

<thead>
     <tr style="background: #dcdcdc">
 	 <th> <p> Tema</th> </p> 
		<th> <p>Problem Statement</th> </p> 
		<th> <p> Aliran Proses</th> </p>
		<th> <p> Target</th> </p>
		<th> <p> Implementasi</th> </p>
    <th> <p> Yokoten</th> </p>
	<th> <p> status</th> </p>
    <th><p align="center"> Aksi</th> </p>
	</tr>
</thead>
	
	<tr>
	<?php 
	foreach ($record->result() as $d) 
	{ 
		echo "<tr>
		<td>$d->tema</td>
		<td>$d->problem_statement</td>
		<td>$d->aliran_proses</td>
        <td>$d->target</td>
        <td>$d->implementasi</td>
		<td>$d->yokoten</td>
		<td>$d->status</td>
		
		<td>".anchor('A3/ubah_status/'.$d->Id_a3report,'Validasi',array('class'=> 'btn btn-primary'))." </td>
		</td>
	    </tr>";

	}
	?>
</table>