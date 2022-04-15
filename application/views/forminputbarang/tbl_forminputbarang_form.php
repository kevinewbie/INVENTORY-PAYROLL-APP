<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Form Input Barang</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Id Barang <?php echo form_error('id_barang') ?></td><td><input type="text" class="form-control" name="id_barang" id="id_barang" placeholder="Id Barang" value="<?php echo $id_barang; ?>" /></td></tr>
	    <tr><td width='200'>Nama Barang <?php echo form_error('nm_barang') ?></td><td><input type="text" class="form-control" name="nm_barang" id="nm_barang" placeholder="Nm Barang" value="<?php echo $nm_barang; ?>" /></td></tr>
	    <tr><td width='200'>Satuan <?php echo form_error('satuan') ?></td><td><input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan" value="<?php echo $satuan; ?>" /></td></tr>
	    <tr><td width='200'>Minimal stok <?php echo form_error('minstok') ?></td><td><input type="number" min="0" step="1" class="form-control" name="minstok" id="minstok" placeholder="Minstok" value="<?php echo $minstok; ?>" /></td></tr>
	    <tr><td width='200'>Maximal stok <?php echo form_error('maxstok') ?></td><td><input type="number" min="0" step="1" class="form-control" name="maxstok" id="maxstok" placeholder="Maxstok" value="<?php echo $maxstok; ?>" /></td></tr>
	    <tr><td width='200'>Stok Tersedia <?php echo form_error('stoktersedia') ?></td><td><input type="number" min="0" step="1" class="form-control" name="stoktersedia" id="stoktersedia" placeholder="Stoktersedia" value="<?php echo $stoktersedia; ?>" /></td></tr>
	    <tr><td width='200'>Kisaran Harga Satuan <?php echo form_error('kisaran_hargasatuan') ?></td><td><input type="text" class="form-control" name="kisaran_hargasatuan" id="kisaran_hargasatuan" placeholder="Kisaran Hargasatuan" value="<?php echo $kisaran_hargasatuan; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_nmr" value="<?php echo $id_nmr; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('forminputbarang') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>

