<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_ASETGERAK</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Kode Aset <?php echo form_error('kode_aset') ?></td><td><input type="text" class="form-control" name="kode_aset" id="kode_aset" placeholder="Kode Aset" value="<?php echo $kode_aset; ?>" /></td></tr>
	    <tr><td width='200'>Nama Aset <?php echo form_error('nama_aset') ?></td><td><input type="text" class="form-control" name="nama_aset" id="nama_aset" placeholder="Nama Aset" value="<?php echo $nama_aset; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_aset" value="<?php echo $id_aset; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('asetgerak') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>