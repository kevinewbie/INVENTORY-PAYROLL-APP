<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Input Data Permintaan Barang</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            <div class="box-body ">
<table class='table table-bordered table-responsive no-padding>' 

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-red">
              <span class="info-box-icon"><i class="fa fa-info"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Perhatian</span>
                <span class="info-box-number">Pilih dan Klik Posisi untuk mendapatkan Nomor Permintaan</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                  
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
            <tr><td width='200'> Posisi<?php echo form_error('kd_posisi') ?></td><td>
         <?php echo cmb_pbarang('kd_posisi', 'tbl_posisi', 'nama_posisi', 'nama_posisi')?></td></tr>
 <tr><td width='200'> <?php echo form_error('no_kontrak') ?></td><td> <div class="capos">
         </div></td></tr>

	
	    <tr><td width='200'>Tanggal <?php echo form_error('tanggal') ?></td><td><input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td></tr>
	    <tr><td width='200'>Status Permintaan Barang <?php echo form_error('status_pb') ?></td><td><input type="text" class="form-control" name="status_pb" id="status_pb" placeholder="Status Permintaan Barang" value="<?php echo $status_pb; ?>" /></td></tr>
	    

	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?> & Selanjutnya</button> 
	    <a href="<?php echo site_url('permintaanbarang') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>

<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.chained.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
 function drokdon(){
        var kd_posisi = $('#kd_posisi').val();
        $.ajax({
            url:"<?php echo base_url(); ?>index.php/permintaanbarang/hide_kontrak",
            data:"kd_posisi="+kd_posisi.substr(0,1) ,
            success: function(html)
            {
               $(".capos").html(html);
            }
        });
    }
 </script>



