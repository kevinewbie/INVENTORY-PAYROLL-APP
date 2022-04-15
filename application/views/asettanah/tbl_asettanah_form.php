<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Input Aset Tanah</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Jenis Aset <?php echo form_error('kd_jenis') ?></td><td><input type="text" class="form-control" name="kd_jenis" id="kd_jenis" readonly="Aset Tanah" placeholder="Aset Tanah" value="Aset Tanah" /></td></tr>
	    <tr><td width='200'>Kode Aset Tanah <?php echo form_error('kd_tanah') ?></td><td><input type="text" class="form-control" name="kd_tanah" id="kd_tanah" placeholder="Kd Tanah" value="<?php echo $kd_tanah; ?>" /></td></tr>
	    <tr><td width='200'>Nama Aset Tanah <?php echo form_error('nama_tanah') ?></td><td><input type="text" class="form-control" name="nama_tanah" id="nama_tanah" placeholder="Nama Tanah" value="<?php echo $nama_tanah; ?>" /></td></tr>
	    <tr><td width='200'>Lokasi <?php echo form_error('lokasi') ?></td><td><input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi" value="<?php echo $lokasi; ?>" /></td></tr>
	    <tr><td width='200'>Asal <?php echo form_error('asal') ?></td><td><input type="text" class="form-control" name="asal" id="asal" placeholder="Asal" value="<?php echo $asal; ?>" /></td></tr>
	    <tr><td width='200'>Nomor Sertifikat <?php echo form_error('nomor_sertifikat') ?></td><td><input type="text" class="form-control" name="nomor_sertifikat" id="nomor_sertifikat" placeholder="Nomor Sertifikat" value="<?php echo $nomor_sertifikat; ?>" /></td></tr>
	    <tr><td width='200'>Luas <?php echo form_error('luas') ?></td><td><input type="text" class="form-control" name="luas" id="luas" placeholder="Luas" value="<?php echo $luas; ?>" /></td></tr>
	    <tr><td width='200'>Tahun <?php echo form_error('tahun') ?></td><td><input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" /></td></tr>
	    <tr><td width='200'>Kondisi <?php echo form_error('kondisi') ?></td><td><input type="text" class="form-control" name="kondisi" id="kondisi" placeholder="Kondisi" value="<?php echo $kondisi; ?>" /></td></tr>
	    <tr><td width='200'>Harga <?php echo form_error('harga') ?></td><td><input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" /></td></tr>
	    <tr><td width='200'>Status <?php echo form_error('status') ?></td><td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /></td></tr>
	    
        <tr><td width='200'>Ket <?php echo form_error('ket') ?></td><td> <textarea class="form-control" rows="3" name="ket" id="ket" placeholder="Ket"><?php echo $ket; ?></textarea></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_asettanah" value="<?php echo $id_asettanah; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('asettanah') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>