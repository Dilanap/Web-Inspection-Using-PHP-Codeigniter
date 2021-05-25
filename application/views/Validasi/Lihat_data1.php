<!-- DataTales Example -->
<h1>Data CPAR</h1>
<div class="card shadow mb-4">
<div class="card-header py-3">
  <!--<a href="<?php echo base_url(); ?>Cpar/tambah" class="btn btn-primary">Tambah Data CPAR</a>-->
</div>
<div class="card-body">
  <div class="table-responsive">
	<?php echo $this->session->flashdata('message');?>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>ID Checksheet</th>
        <th>Rincian Kerusakan</th>
        <th>Penyebab</th>
        <th>Tanggal masalah</th>
        <th>Tindakan</th>
        <th>Tanggal Selesai</th>
        <th>Validasi</th>

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
