<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Input Detail Pembelian</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nomor Po <?php echo form_error('no_po') ?></td><td><input type="text" class="form-control" name="no_po" id="no_po" placeholder="No Po" value="<?php echo $no_po; ?>" /></td></tr>
	    <tr><td width='200'>Jumlah Ok <?php echo form_error('jlh_ok') ?></td><td><input type="text" class="form-control" name="jlh_ok" id="jlh_ok" placeholder="Jlh Ok" value="<?php echo $jlh_ok; ?>" /></td></tr>
	    <tr><td width='200'>Harga Satuan <?php echo form_error('harga_satuan') ?></td><td><input type="text" class="form-control" name="harga_satuan" id="harga_satuan" placeholder="Harga Satuan" value="<?php echo $harga_satuan; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_nmr" value="<?php echo $id_nmr; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('detailpembelian') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>