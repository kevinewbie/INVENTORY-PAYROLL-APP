<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Input Data Aset Kendaraan</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	   <tr><td width='200'>Jenis Aset <?php echo form_error('kd_jenis') ?></td><td><input type="text" class="form-control" name="kd_jenis" id="kd_jenis" readonly="Aset Kendaraan" placeholder="Aset Kendaraan" value="Aset Kendaraan" /></td></tr>
	    <tr><td width='200'>Kd Kendaraan <?php echo form_error('kd_Kendaraan') ?></td><td><input type="text" class="form-control" name="kd_Kendaraan" id="kd_Kendaraan" placeholder="Kd Kendaraan" value="<?php echo $kd_Kendaraan; ?>" /></td></tr>
	    <tr><td width='200'>Nama Kendaraan <?php echo form_error('nm_Akantor') ?></td><td><input type="text" class="form-control" name="nm_Akantor" id="nm_Akantor" placeholder="Nm Akantor" value="<?php echo $nm_Akantor; ?>" /></td></tr>
	    <tr><td width='200'>Merk <?php echo form_error('merk') ?></td><td><input type="text" class="form-control" name="merk" id="merk" placeholder="Merk" value="<?php echo $merk; ?>" /></td></tr>
	    <tr><td width='200'>Asal <?php echo form_error('asal') ?></td><td><input type="text" class="form-control" name="asal" id="asal" placeholder="Asal" value="<?php echo $asal; ?>" /></td></tr>
	    <tr><td width='200'>Tahun <?php echo form_error('tahun') ?></td><td><input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" /></td></tr>
	    <tr><td width='200'>Jumlah <?php echo form_error('jumlah') ?></td><td><input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" /></td></tr>
	    <tr><td width='200'>Status <?php echo form_error('status') ?></td><td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /></td></tr>
	    <tr><td width='200'>Kondisi <?php echo form_error('kondisi') ?></td><td><input type="text" class="form-control" name="kondisi" id="kondisi" placeholder="Kondisi" value="<?php echo $kondisi; ?>" /></td></tr>
	    <tr><td width='200'>Harga <?php echo form_error('harga') ?></td><td><input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" /></td></tr>
	    <tr><td width='200'>Nomor Rangka <?php echo form_error('nomor_Rangka') ?></td><td><input type="text" class="form-control" name="nomor_Rangka" id="nomor_Rangka" placeholder="Nomor Rangka" value="<?php echo $nomor_Rangka; ?>" /></td></tr>
	    <tr><td width='200'>Nomor Polisi <?php echo form_error('nomor_polisi') ?></td><td><input type="text" class="form-control" name="nomor_polisi" id="nomor_polisi" placeholder="Nomor Polisi" value="<?php echo $nomor_polisi; ?>" /></td></tr>
	    <tr><td width='200'>Nomor Bpkb <?php echo form_error('nomor_bpkb') ?></td><td><input type="text" class="form-control" name="nomor_bpkb" id="nomor_bpkb" placeholder="Nomor Bpkb" value="<?php echo $nomor_bpkb; ?>" /></td></tr>
	    <tr><td width='200'>Spek Lain <?php echo form_error('spek_lain') ?></td><td><input type="text" class="form-control" name="spek_lain" id="spek_lain" placeholder="Spek Lain" value="<?php echo $spek_lain; ?>" /></td></tr>
	    
        <tr><td width='200'>Ket <?php echo form_error('ket') ?></td><td> <textarea class="form-control" rows="3" name="ket" id="ket" placeholder="Ket"><?php echo $ket; ?></textarea></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_AsetKendaraan" value="<?php echo $id_AsetKendaraan; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('asetkendaraan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>