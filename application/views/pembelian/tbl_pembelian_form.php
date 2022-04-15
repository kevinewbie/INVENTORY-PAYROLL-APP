<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Input Data Pembelian</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nomor Purchasing Order <?php echo form_error('no_po') ?></td><td><input type="text" class="form-control" name="no_po" id="no_po" placeholder="Nomor Purchasing Order" value="<?php echo $no_po; ?>" /></td></tr>
	    <tr><td width='200'>Tanggal Purchasing Order <?php echo form_error('tgl_po') ?></td><td><input type="date" class="form-control" name="tgl_po" id="tgl_po" placeholder="Tgl Po" value="<?php echo $tgl_po; ?>" /></td></tr>
	    <tr><td width='200'>Nomor Pembelian <?php echo form_error('no_pembelian') ?></td><td><input type="text" class="form-control" name="no_pembelian" id="no_pembelian" placeholder="Nomor Pembelian" value="<?php echo $no_pembelian; ?>" /></td></tr>
	    <tr><td width='200'>Id Supplier <?php echo form_error('id_sup') ?></td><td><input type="text" class="form-control" name="id_sup" id="id_sup" placeholder="Id Supplier" value="<?php echo $id_sup; ?>" /></td></tr>
	    <tr><td width='200'>Cara Bayar <?php echo form_error('carabayar') ?></td><td><input type="text" class="form-control" name="carabayar" id="carabayar" placeholder="Carabayar" value="<?php echo $carabayar; ?>" /></td></tr>
	    <tr><td width='200'>Ongkos Kirim <?php echo form_error('ongkir') ?></td><td><input type="text" class="form-control" name="ongkir" id="ongkir" placeholder="Ongkir" value="<?php echo $ongkir; ?>" /></td></tr>
	   		 <tr><td width='200'>Barang<?php echo form_error('barang') ?></td><td> <textarea class="form-control" rows="3" name="barang" id="barang" placeholder="Barang"><?php echo $barang; ?></textarea></td></tr>
	    <tr><td width='200'>Jumlah<?php echo form_error('jlh_ok') ?></td><td><input type="text" class="form-control" name="jlh_ok" id="jlh_ok" placeholder="Jumlah" value="<?php echo $jlh_ok; ?>" /></td></tr>
	    
			 <tr><td width='200'>Harga Satuan<?php echo form_error('harga_satuan') ?></td><td> <textarea class="form-control" rows="3" name="harga_satuan" id="harga_satuan" placeholder="Harga Satuan"><?php echo $harga_satuan; ?></textarea></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_nmr" value="<?php echo $id_nmr; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('pembelian') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>