<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_DETAILPBARANG</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>No Detail <?php echo form_error('no_detail') ?></td><td><input type="text" class="form-control" name="no_detail" id="no_detail" placeholder="No Detail" value="<?php echo $no_detail; ?>" /></td></tr>
	    <tr><td width='200'>No Pb <?php echo form_error('no_pb') ?></td><td><input type="text" class="form-control" name="no_pb" id="no_pb" placeholder="No Pb" value="<?php echo $no_pb; ?>" /></td></tr>
	    <tr><td width='200'>Id Barang <?php echo form_error('id_barang') ?></td><td><input type="text" class="form-control" name="id_barang" id="id_barang" placeholder="Id Barang" value="<?php echo $id_barang; ?>" /></td></tr>
	    <tr><td width='200'>Jlh Satuan <?php echo form_error('jlh_satuan') ?></td><td><input type="text" class="form-control" name="jlh_satuan" id="jlh_satuan" placeholder="Jlh Satuan" value="<?php echo $jlh_satuan; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_nmr" value="<?php echo $id_nmr; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('detailpbarang') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>