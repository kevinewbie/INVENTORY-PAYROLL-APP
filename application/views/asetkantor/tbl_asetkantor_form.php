<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_ASETKANTOR</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Kd Jenis <?php echo form_error('kd_jenis') ?></td><td><input type="text" class="form-control" name="kd_jenis" id="kd_jenis" placeholder="Kd Jenis" value="<?php echo $kd_jenis; ?>" /></td></tr>
	    <tr><td width='200'>Kd AKantor <?php echo form_error('kd_AKantor') ?></td><td><input type="text" class="form-control" name="kd_AKantor" id="kd_AKantor" placeholder="Kd AKantor" value="<?php echo $kd_AKantor; ?>" /></td></tr>
	    <tr><td width='200'>Nm Akantor <?php echo form_error('nm_Akantor') ?></td><td><input type="text" class="form-control" name="nm_Akantor" id="nm_Akantor" placeholder="Nm Akantor" value="<?php echo $nm_Akantor; ?>" /></td></tr>
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
	    
        <tr><td width='200'>Ket <?php echo form_error('ket') ?></td><td> <textarea class="form-control" rows="3" name="ket" id="ket" placeholder="Ket"><?php echo $ket; ?></textarea></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_aset" value="<?php echo $id_aset; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('asetkantor') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>