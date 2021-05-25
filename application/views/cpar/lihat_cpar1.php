<!-- DataTales Example -->
<h3>Data Tindakan Perbaikan</h3>
<div class="card shadow mb-4">
<div class="card-header py-3">
 
</div>
<div class="card-body">
  <div class="table-responsive">
	<?php echo $this->session->flashdata('message');?>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>No Rincian</th>
        <th>Rincian Kerusakan</th>
        <th>Penyebab</th>
        <th>Tanggal Masalah</th>
        <th>Tindakan</th>
        <th>Tanggal Selesai</th>
		 <th>Tanggal Verifikasi</th>
        
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($record->result() as $cs) {
        echo "<tr>
        <td>$cs->Id_rincian</td>
        <td>$cs->rincian_kerusakan</td>
        <td>$cs->penyebab</td>
        <td>$cs->tgl_masalah</td>
        <td>$cs->tindakan</td>
        <td>$cs->tgl_selesai</td>
        <td>$cs->tgl_verifikasi</td>
        <td>

        </td>
        
      </tr>";
      $no++;
      }
    ?>
    
    </tbody>
  </table>
  </div>



<!-- Modal Input -->






</div>
</div>
</div>
</div>
