<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Input Detail Barang Masuk</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Id Barang Masuk <?php echo form_error('id_barangmasuk') ?></td><td><input type="text" class="form-control" name="id_barangmasuk" id="id_barangmasuk" placeholder="Id Barangmasuk" value="<?php echo $id_barangmasuk; ?>" /></td></tr>
	    <tr><td width='200'>Id Barang <?php echo form_error('id_barang') ?></td><td><input type="text" class="form-control" name="id_barang" id="id_barang" placeholder="Id Barang" value="<?php echo $id_barang; ?>" /></td></tr>
	    <tr><td width='200'>Jumlah Masuk <?php echo form_error('jlh_masuk') ?></td><td><input type="text" class="form-control" name="jlh_masuk" id="jlh_masuk" placeholder="Jlh Masuk" value="<?php echo $jlh_masuk; ?>" /></td></tr>
	    <tr><td width='200'>Kode Posisi <?php echo form_error('kd_posisi') ?></td><td><input type="text" class="form-control" name="kd_posisi" id="kd_posisi" placeholder="Kd Posisi" value="<?php echo $kd_posisi; ?>" /></td></tr>
	    <tr><td width='200'>Nomor Kontrak <?php echo form_error('no_kontrak') ?></td><td><input type="text" class="form-control" name="no_kontrak" id="no_kontrak" placeholder="No Kontrak" value="<?php echo $no_kontrak; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_nmr" value="<?php echo $id_nmr; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('detailbarangmasuk') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>