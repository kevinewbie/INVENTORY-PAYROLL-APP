<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_MUTASI</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Kd Mutasi <?php echo form_error('kd_mutasi') ?></td><td><input type="text" class="form-control" name="kd_mutasi" id="kd_mutasi" placeholder="Kd Mutasi" value="<?php echo $kd_mutasi; ?>" /></td></tr>
	    <tr><td width='200'>Jenis Alat Produk<?php echo form_error('nama_alpro') ?></td><td>
		 <?php echo cmb_dinamis('nama_alpro', 'tbl_jaset', 'nama_jenis', 'nama_jenis')?>
	    <tr><td width='200'>Nama Bmutasi <?php echo form_error('nama_bmutasi') ?></td><td><input type="text" class="form-control" name="nama_bmutasi" id="nama_bmutasi" placeholder="Nama Bmutasi" value="<?php echo $nama_bmutasi; ?>" /></td></tr>
	    <tr><td width='200'>Jumlah <?php echo form_error('jumlah') ?></td><td><input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" /></td></tr>
	    <tr><td width='200'>Posisi<?php echo form_error('posisi_aset') ?></td><td>
		 <?php echo cmb_dinamis('posisi_aset', 'tbl_jaset', 'nama_jenis', 'nama_jenis')?>
	    <tr><td width='200'>Kondisi <?php echo form_error('kondisi') ?></td><td><input type="text" class="form-control" name="kondisi" id="kondisi" placeholder="Kondisi" value="<?php echo $kondisi; ?>" /></td></tr>
	    <tr><td width='200'>Penanggungjawab <?php echo form_error('penanggungjawab') ?></td><td><input type="text" class="form-control" name="penanggungjawab" id="penanggungjawab" placeholder="Penanggungjawab" value="<?php echo $penanggungjawab; ?>" /></td></tr>
	    <tr><td width='200'>Nokontrak <?php echo form_error('nokontrak') ?></td><td><input type="text" class="form-control" name="nokontrak" id="nokontrak" placeholder="Nokontrak" value="<?php echo $nokontrak; ?>" /></td></tr>
	    
        <tr><td width='200'>Ket <?php echo form_error('ket') ?></td><td> <textarea class="form-control" rows="3" name="ket" id="ket" placeholder="Ket"><?php echo $ket; ?></textarea></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_mutasi" value="<?php echo $id_mutasi; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('mutasik') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>