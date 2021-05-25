<h4>Tentukan Fakta yang ada:</h4>

<form name="form1″ method="post" action="<?php echo base_url();?>index.php/kmeans/hasil">

<table align="center">

<tr>

<!–<label >Masukan Nama Table Database</label><input type="text" name="table"/></th></br>–>

<th><label >Masukan Jumlah Kluster</label></br><input type="text" name="jumklas"/></th>

</tr>

<tr>

<th><input type="submit" value="submit" name="submit"></th>

</tr>

</table>

</form>

hasil.php

            <aside class="right-side">

<!– Content Header (Page header) –>

<section class="content-header">

<h1>

Data Tables

 

</h1>

<ol class="breadcrumb">

<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li><a href="#">Algoritma Nearest Neighbor</a></li>

<li class="active">Learning Data</li>

</ol>

</section>

<!– Main content –>

<section class="content">

Clustering K-Means
<!– /.box-header –>

<table id="example2″ class="table table-bordered table-hover">

 

<thead>

<th>centroid</th>

<th>jarak</th>

<th>anggota kluster</th>

</thead>

<tbody>

<?php for($j=0;$j<$jumlah;$j++){?>

<tr>

<td><?php echo $datahasil[$j]['centroid'];?></td>

<td><?php echo $datahasil[$j]['jarak'];?></td>

<td><?php echo $datahasil[$j]['kluster'];?></td>

</tr>

<?php } ?>

</tbody>

 

</table>

<!– /.box-body –>

</div><!– /.box –>

<table id="example2″ class="table table-bordered table-hover">

 

<thead>

<th>kluster</th>

<th>centroid pembangkit</th>

</thead>

<tbody>

<?php for($j=0;$j<$jumklas;$j++){?>

<tr>

<td><?php echo $j?></td>

<td><?php echo $centroid[$j]?></td>

</tr>

<?php } ?>

</tbody>

 

</table>

</div>

</div>

</section><!– /.content –>

</aside><!– /.right-side –>