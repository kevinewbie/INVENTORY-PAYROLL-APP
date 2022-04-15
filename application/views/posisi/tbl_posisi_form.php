<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_POSISI</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Kd Posisi <?php echo form_error('kd_posisi') ?></td><td><input type="text" class="form-control" name="kd_posisi" id="kd_posisi" placeholder="Kd Posisi" value="<?php echo $kd_posisi; ?>" /></td></tr>
	    <tr><td width='200'>Nama Posisi <?php echo form_error('nama_posisi') ?></td><td><input type="text" class="form-control" name="nama_posisi" id="nama_posisi" placeholder="Nama Posisi" value="<?php echo $nama_posisi; ?>" /></td></tr>
	    
        <tr><td width='200'>Keterangan <?php echo form_error('keterangan') ?></td><td> <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_posisi" value="<?php echo $id_posisi; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('posisi') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>