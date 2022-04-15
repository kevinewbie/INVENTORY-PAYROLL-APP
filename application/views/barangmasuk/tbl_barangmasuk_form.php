<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Input Data Barang Masuk</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Id Barang Masuk <?php echo form_error('id_barangmasuk') ?></td><td><input type="text" class="form-control" name="id_barangmasuk" id="id_barangmasuk" placeholder="Id Barangmasuk" value="<?php echo $id_barangmasuk; ?>" /></td></tr>
	    <tr><td width='200'>Tanggal Barangmasuk <?php echo form_error('tgl_barangmasuk') ?></td><td><input type="date" class="form-control" name="tgl_barangmasuk" id="tgl_barangmasuk" placeholder="Tgl Barangmasuk" value="<?php echo $tgl_barangmasuk; ?>" /></td></tr>
	    <tr><td width='200'>Nomor Faktur <?php echo form_error('no_faktur') ?></td><td><input type="text" class="form-control" name="no_faktur" id="no_faktur" placeholder="No Faktur" value="<?php echo $no_faktur; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_nmr" value="<?php echo $id_nmr; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('barangmasuk') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>