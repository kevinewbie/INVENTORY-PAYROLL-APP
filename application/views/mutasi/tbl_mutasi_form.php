<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
            	   <h2 class="card-title">Input Data Mutasi</h2>
                
               
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	

	    <tr><td width='200'>Kd Mutasi <?php echo form_error('kd_mutasi') ?></td><td><input type="text" class="form-control" name="kd_mutasi" id="kd_mutasi" placeholder="Kd Mutasi" value="<?php echo $kd_mutasi; ?>" /></td></tr>
	    
		<tr><td width='200'>Jenis Aset <?php echo form_error('nama_alpro') ?></td><td>
		<?php echo form_dropdown('nama_alpro', array('Silahkan Pilih' => 'Silahkan Pilih','Kantor' => 'Aset Kantor', 'Kendaraan' => 
		'Aset Kendaraan', 'Produksi' => 'Aset Produksi'), $nama_alpro, array('class' => 'form-control', 'id' => 'tipe_aset', 'onChange' => 'drokdon()')); ?>
	
	    <tr><td width='200'>Nama Barang <?php echo form_error('nama_bmutasi') ?></td><td> <div class="capos">
		 </div></td></tr>
		
	    <tr><td width='200'>Jumlah <?php echo form_error('jumlah') ?></td><td><input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" /></td></tr>

	      <tr><td width='200'>Posisi Aset Awal<?php echo form_error('posisi_asetawal') ?></td><td>
		 <?php echo cintli('posisi_asetawal', 'tbl_posisi', 'nama_posisi', 'nama_posisi')?>

		  <tr><td width='200'>Posisi Aset Akhir<?php echo form_error('posisi_asetakhir') ?></td><td>
		 <?php echo contlo('posisi_asetakhir', 'tbl_posisi', 'nama_posisi', 'nama_posisi')?>

	   <tr><td width='200'><?php echo form_error('nokontrak') ?></td><td> <div class="cipis">
		 </div></td></tr>
		 <tr><td width='200'><?php echo form_error('nokontrak') ?></td><td> <div class="cepes">
		 </div></td></tr>

	    <tr><td width='200'>Kondisi <?php echo form_error('kondisi') ?></td><td><input type="text" class="form-control" name="kondisi" id="kondisi" placeholder="Kondisi" value="<?php echo $kondisi; ?>" /></td></tr>

	    <tr><td width='200'>Penanggungjawab <?php echo form_error('penanggungjawab') ?></td><td><input type="text" class="form-control" name="penanggungjawab" id="penanggungjawab" placeholder="Penanggungjawab" value="<?php echo $penanggungjawab; ?>" /></td></tr>    

        <tr><td width='200'>Ket <?php echo form_error('ket') ?></td><td> <textarea class="form-control" rows="3" name="ket" id="ket" placeholder="Ket"><?php echo $ket; ?></textarea></td></tr>

	    <tr><td></td><td><input type="hidden" name="id_mutasi" value="<?php echo $id_mutasi; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('mutasi') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table>
 </form>        </div>
</div>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.chained.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
    $(function() {
        //autocomplete
        $("#nama_bmutasi").autocomplete({
            source: "<?php echo base_url() ?>index.php/mutasi/autocomplete_aset",
			
            minLength: 4    });				
    });
</script>

  <script type="text/javascript">
 function drokdon(){
        var tipe_aset = $('#tipe_aset').val();
        $.ajax({
            url:"<?php echo base_url(); ?>index.php/mutasi/gantibmutasi",
            data:"tipe_aset="+tipe_aset ,
            success: function(html)
            {
               $(".capos").html(html);
            }
        });
    }
 </script>

 <script type="text/javascript">
 function drikdin(){
        var posisi_asetakhir = $('#posisi_asetakhir').val();
        $.ajax({
            url:"<?php echo base_url(); ?>index.php/mutasi/hide_kontrak",
            data:"posisi_asetakhir="+posisi_asetakhir.substr(0,1) ,
            success: function(html)
            {
               $(".cipis").html(html);
            }
        });
    }
 </script>
 
  <script type="text/javascript">
 //function dafuq(){
        var posisi_asetawal = $('#posisi_asetawal').val();
        $.ajax({
            url:"<?php echo base_url(); ?>index.php/mutasi/hide_kontrak",
            data:"posisi_asetawal="+posisi_asetawal.substr(0,1) ,
            success: function(html)
            {
               $(".cepes").html(html);
            }
        });
    }
 </script>
