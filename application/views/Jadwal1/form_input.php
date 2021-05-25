<div class="row">
    <div class="col-xs-6">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Form Tambah Data Rincian</h3>
        </div><!-- /.box-header -->
        <!-- form start -->

        <?= 
        	form_open('Rincian/simpan'); 
        ?>
        <form role="form">
          <div class="box-body">
            <div class="form-group">
              <label>Rincian Kerusakan</label>
              <input type="text" name="rincian_kerusakan" class="form-control" id="" placeholder="Rincian Kerusakan" required="">
            </div>
            <div class="form-group">
              <label>Penyebab</label>
              <textarea class="form-control" name="penyebab" placeholder="penyebab" required=""></textarea>
            </div>
			 <div class="form-group">
              <label>Tanggal Masalah</label>
              <textarea class="form-control" name="tgl_masalah" placeholder="tgl_masalah" required=""></textarea>
            </div>
			 <div class="form-group">
              <label>Tindakan</label>
              <textarea class="form-control" name="tindakan" placeholder="tindakan" required=""></textarea>
            </div>
			 <div class="form-group">
              <label>Tanggal Selesai</label>
              <textarea class="form-control" name="tgl_selesai" placeholder="tgl_selesai" required=""></textarea>
            </div>
			 <div class="form-group">
              <label>Validasi</label>
              <textarea class="form-control" name="validasi" placeholder="validasi" required=""></textarea>
            </div>
			 <div class="form-group">
              <label>Tanggal Verifikasi</label>
              <textarea class="form-control" name="tgl_verifikasi" placeholder="tgl_verifikasi" required=""></textarea>
            </div>
          </div><!-- /.box-body -->
 
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="<?php echo base_url(); ?>Produk" class='btn btn-danger'>Kembali</a>
          </div>
        </form>
      </div>
    </div>  
 </div>