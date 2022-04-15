<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_TESITEM</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Kd Jenis <?php echo form_error('kd_jenis') ?></td><td><input type="text" class="form-control" name="kd_jenis" id="kd_jenis" placeholder="Kd Jenis" value="<?php echo $kd_jenis; ?>" /></td></tr>
	    <tr><td width='200'>Maman <?php echo form_error('maman') ?></td><td><input type="text" class="form-control" name="maman" id="maman" placeholder="Maman" value="<?php echo $maman; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="kd_bangunan" value="<?php echo $kd_bangunan; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('tesitem') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>