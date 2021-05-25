<div class="panel panel-default" id="panel"> 
<div class="panel-heading"> Jadwal Pemeriksaan</div>
<div class="panel-body">


<table class="table table-bordered table-hover table-striped cell-border" id="example1">


            <thead>

                  <tr>

                        <td>Kode jadwal</td>

                        <td>Type Unit</td>

                        <td>Sequence</td>

                        <td>No Chasis</td>

                        <td>Warna</td>
                  </tr>

            </thead>

            </tbody>

                  <?php

                        foreach($data->result_array() as $i):

                              $jadwal_id=$i['Id_jadwal'];

                              $type_unit=$i['type_unit'];

                              $sequence=$i['sequence'];

                              $no_chasis=$i['no_chasis'];

                              $warna=$i['warna'];

                  ?>

                  <tr>

                        <td><?php echo $jadwal_id;?> </td>

                        <td><?php echo $type_unit;?> </td>

                        <td><?php echo $sequence;?> </td>

                        <td><?php echo $no_chasis;?> </td>

			<td><?php echo $warna;?> </td>

                  </tr>

                  <?php endforeach;?>

            </tbody>

      </table>

     

</div>

 </div>
 </div>


<script src="<?php echo base_url().'assets/js/jquery-2.2.4.min.js'?>"> </script>

<script src="<?php echo base_url().'assets/js/bootstrap.js'?>"> </script>

<script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"> </script>

<script src="<?php echo base_url().'assets/js/moment.js'?>"> </script>

<script>

      $(document).ready(function(){

            $('#mydata').DataTable();

      });

</script>

</body>

</html>