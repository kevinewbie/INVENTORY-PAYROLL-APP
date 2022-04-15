<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Input Aset Bangunan</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

 <tr><td width='200'>Jenis Aset <?php echo form_error('kd_jenis') ?></td><td><input type="text" class="form-control" name="kd_jenis" id="kd_jenis" readonly="Aset Bangunan" placeholder="Aset Bangunan" value=" Aset Bangunan " /></td></tr>
	  	    <tr><td width='200'>Kode Bangunan <?php echo form_error('kode_bangunan') ?></td><td><input type="text" class="form-control" name="kode_bangunan" id="kode_bangunan" placeholder="Kode Bangunan" value="<?php echo $kode_bangunan; ?>" /></td></tr>
	    <tr><td width='200'>Nama Bangunan <?php echo form_error('nama_bangunan') ?></td><td><input type="text" class="form-control" name="nama_bangunan" id="nama_bangunan" placeholder="Nama Bangunan" value="<?php echo $nama_bangunan; ?>" /></td></tr>
	    <tr><td width='200'>Lokasi <?php echo form_error('lokasi') ?></td><td><input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi" value="<?php echo $lokasi; ?>" /></td></tr>
	    <tr><td width='200'>Asal <?php echo form_error('asal') ?></td><td><input type="text" class="form-control" name="asal" id="asal" placeholder="Asal" value="<?php echo $asal; ?>" /></td></tr>
	    <tr><td width='200'>No Sertifikat <?php echo form_error('no_sertifikat') ?></td><td><input type="text" class="form-control" name="no_sertifikat" id="no_sertifikat" placeholder="No Sertifikat" value="<?php echo $no_sertifikat; ?>" /></td></tr>
	    <tr><td width='200'>Luas <?php echo form_error('luas') ?></td><td><input type="text" class="form-control" name="luas" id="luas" placeholder="Luas" value="<?php echo $luas; ?>" /></td></tr>
	    <tr><td width='200'>Tahun <?php echo form_error('tahun') ?></td><td><input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" /></td></tr>
	    <tr><td width='200'>Kondisi <?php echo form_error('kondisi') ?></td><td><input type="text" class="form-control" name="kondisi" id="kondisi" placeholder="Kondisi" value="<?php echo $kondisi; ?>" /></td></tr>
	    <tr><td width='200'>Harga <?php echo form_error('harga') ?></td><td><input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" /></td></tr>
	    <tr><td width='200'>Status <?php echo form_error('status') ?></td><td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /></td></tr>
	    
        <tr><td width='200'>Ket <?php echo form_error('ket') ?></td><td> <textarea class="form-control" rows="3" name="ket" id="ket" placeholder="Ket"><?php echo $ket; ?></textarea></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_asetbangunan" value="<?php echo $id_asetbangunan; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('abangunan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>