<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Input Aset Produksi</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Jenis Aset <?php echo form_error('kd_jenis') ?></td><td><input type="text" class="form-control" name="kd_jenis" id="kd_jenis" readonly="Aset Produksi" placeholder="Aset Produksi" value="Aset Produksi" /></td></tr>
	    <tr><td width='200'>Kode Alat Produksi <?php echo form_error('kd_Aproduksi') ?></td><td><input type="text" class="form-control" name="kd_Aproduksi" id="kd_Aproduksi" placeholder="Kd Aproduksi" value="<?php echo $kd_Aproduksi; ?>" /></td></tr>
	    <tr><td width='200'>Nama Aset Produksi <?php echo form_error('nama_AsetProduksi') ?></td><td><input type="text" class="form-control" name="nama_AsetProduksi" id="nama_AsetProduksi" placeholder="Nama AsetProduksi" value="<?php echo $nama_AsetProduksi; ?>" /></td></tr>
	    <tr><td width='200'>Merk <?php echo form_error('merk') ?></td><td><input type="text" class="form-control" name="merk" id="merk" placeholder="Merk" value="<?php echo $merk; ?>" /></td></tr>
	    <tr><td width='200'>Asal <?php echo form_error('asal') ?></td><td><input type="text" class="form-control" name="asal" id="asal" placeholder="Asal" value="<?php echo $asal; ?>" /></td></tr>
	    <tr><td width='200'>Tahun <?php echo form_error('tahun') ?></td><td><input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" /></td></tr>
	    <tr><td width='200'>Jumlah <?php echo form_error('jumlah') ?></td><td><input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" /></td></tr>
	    <tr><td width='200'>Satuan <?php echo form_error('satuan') ?></td><td><input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan" value="<?php echo $satuan; ?>" /></td></tr>
	    <tr><td width='200'>Ukuran <?php echo form_error('ukuran') ?></td><td><input type="text" class="form-control" name="ukuran" id="ukuran" placeholder="Ukuran" value="<?php echo $ukuran; ?>" /></td></tr>
	    <tr><td width='200'>Status <?php echo form_error('status') ?></td><td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /></td></tr>
	    <tr><td width='200'>Kondisi <?php echo form_error('kondisi') ?></td><td><input type="text" class="form-control" name="kondisi" id="kondisi" placeholder="Kondisi" value="<?php echo $kondisi; ?>" /></td></tr>
	    <tr><td width='200'>Harga <?php echo form_error('harga') ?></td><td><input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" /></td></tr>
	    <tr><td width='200'>Spek Lain <?php echo form_error('spek_lain') ?></td><td><input type="text" class="form-control" name="spek_lain" id="spek_lain" placeholder="Spek Lain" value="<?php echo $spek_lain; ?>" /></td></tr>
	    <tr><td width='200'>Ket <?php echo form_error('ket') ?></td><td><input type="text" class="form-control" name="ket" id="ket" placeholder="Ket" value="<?php echo $ket; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_asetproduksi" value="<?php echo $id_asetproduksi; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('asetproduksi') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>