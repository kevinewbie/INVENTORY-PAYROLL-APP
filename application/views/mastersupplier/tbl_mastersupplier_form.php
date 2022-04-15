<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Input Data Supplier</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Id Supplier <?php echo form_error('id_sup') ?></td><td><input type="text" class="form-control" name="id_sup" id="id_sup" placeholder="Id Sup" value="<?php echo $id_sup; ?>" /></td></tr>
	    <tr><td width='200'>Alamat Supplier <?php echo form_error('alamat_sup') ?></td><td><input type="text" class="form-control" name="alamat_sup" id="alamat_sup" placeholder="Alamat Sup" value="<?php echo $alamat_sup; ?>" /></td></tr>
	    <tr><td width='200'>Telp Supplier <?php echo form_error('telp_sup') ?></td><td><input type="text" class="form-control" name="telp_sup" id="telp_sup" placeholder="Telp Sup" value="<?php echo $telp_sup; ?>" /></td></tr>
	    <tr><td width='200'>Nama Kontrak <?php echo form_error('nm_kontrak') ?></td><td><input type="text" class="form-control" name="nm_kontrak" id="nm_kontrak" placeholder="Nm Kontrak" value="<?php echo $nm_kontrak; ?>" /></td></tr>
	    <tr><td width='200'>Produk <?php echo form_error('produk') ?></td><td><input type="text" class="form-control" name="produk" id="produk" placeholder="Produk" value="<?php echo $produk; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_nmr" value="<?php echo $id_nmr; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('mastersupplier') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>