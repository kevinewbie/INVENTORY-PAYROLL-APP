<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Input Barang Keluar</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Id Barang Keluar <?php echo form_error('id_barangkeluar') ?></td><td><input type="text" class="form-control" name="id_barangkeluar" id="id_barangkeluar" placeholder="Id Barangkeluar" value="<?php echo $id_barangkeluar; ?>" /></td></tr>
	    <tr><td width='200'>Tanggal Barang Keluar <?php echo form_error('tgl_barangkeluar') ?></td><td><input type="date" class="form-control" name="tgl_barangkeluar" id="tgl_barangkeluar" placeholder="Tgl Barangkeluar" value="<?php echo $tgl_barangkeluar; ?>" /></td></tr>
	    <td>Nama Barang</td><td><?php echo datalist_dinamis('id_barang', 'tbl_forminputbarang', 'nm_barang') ?></td></tr></td></tr>
	    <tr><td width='200'>Jumlah Barang Keluar <?php echo form_error('jumlah_barangkeluar') ?></td><td><input type="text" class="form-control" name="jumlah_barangkeluar" id="jumlah_barangkeluar" placeholder="Jumlah Barangkeluar" value="<?php echo $jumlah_barangkeluar; ?>" /></td></tr>
	    <tr><td width='200'>Keterangan <?php echo form_error('ket') ?></td><td><input type="text" class="form-control" name="ket" id="ket" placeholder="Ket" value="<?php echo $ket; ?>" /></td></tr>
	    <tr><td>Nama Posisi</td><td><?php echo cmb_bk('kode_posisi', 'tbl_posisi', 'nama_posisi', 'nama_posisi')?></td></tr></td> </tr>
	     <tr><td width='200'> <?php echo form_error('kode_pekerjaan') ?></td><td> <div class="capos">
         </div></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_nmr" value="<?php echo $id_nmr; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('barangkeluar') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>

<script type="text/javascript">
 function drokdon(){
        var kode_posisi = $('#kode_posisi').val();
        $.ajax({
            url:"<?php echo base_url(); ?>index.php/barangkeluar/hide_kontrak",
            data:"kode_posisi="+kode_posisi.substr(0,1) ,
            success: function(html)
            {
               $(".capos").html(html);
            }
        });
    }
 </script>