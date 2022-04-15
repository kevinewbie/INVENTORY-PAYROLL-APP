<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Input Data Permintaan Barang</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nomor Permintaan Barang <?php echo form_error('nomor_pb') ?></td><td><input type="text" class="form-control" name="nomor_pb" id="nomor_pb"  readonly=""  placeholder="Nomor Permintaan Barang" value="<?php echo $nomor_pb; ?>" /></td></tr>
	    <tr><td width='200'>Tanggal <?php echo form_error('tanggal') ?></td><td><input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td></tr>
	    <tr><td width='200'>Status Permintaan Barang <?php echo form_error('status_pb') ?></td><td><input type="text" class="form-control" name="status_pb" id="status_pb" placeholder="Status Permintaan Barang" value="<?php echo $status_pb; ?>" /></td></tr>
	    <tr><td width='200'> Posisi<?php echo form_error('kd_posisi') ?></td><td><input type="text" class="form-control" name="kd_posisi" id="kd_posisi" placeholder="Posisi" value="<?php echo $kd_posisi; ?>" /></td></tr>
	    <tr><td width='200'>Nomor Kontrak <?php echo form_error('no_kontrak') ?></td><td><input type="text" class="form-control" name="no_kontrak" id="no_kontrak" placeholder="Nomor Kontrak" value="<?php echo $no_kontrak; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('permintaanbarang') ?>" class="btn btn-info"><i class="fa fa-sign-out"> 
	    </i> Kembali</a>
	    <br><br><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
  Klik Untuk Pengembalian
</button></td></tr>
	</table></form>    



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Permintaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
	   <?php echo form_open ('permintaanbarang/permintaan_action')?>
        <table class="table table-bordered" style="margin-bottom: 10px">
		<input value="<?php echo $no_detail ?>"  type="hidden" name="no_detail">
		<tr><td></td> <td><input value="<?php echo $minta ['nomor_pb']?>" type="hidden" id='no_pb' required   placeholder="Masukkan Nomor Permintaan Barang" name="no_pb" class="form-control ui-autocomplete-input"></td> </tr>
		<td>Nama Barang</td><td><?php echo datalist_dinamis('id_barang', 'tbl_forminputbarang', 'nm_barang') ?></td></tr></td> </tr>
		<tr><td>Jumlah Satuan</td> <td>   <input type="text" id='jlh_satuan' required   placeholder="Masukkan Jumlah Satuan" name="jlh_satuan" class="form-control ui-autocomplete-input"></td> </tr>
		</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
	  </form>
    </div>
  </div>
</div></div>
	
	
      
		
		
			
			 <div class="col-xs-19">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">Detail Barang Permintaan</h3>
                    </div>
       
            
        <table class="table table-bordered" style="margin-bottom: 5px">
           <tr><th>No</th><th>Nomor Permintaan Barang</th><th>Nama Barang</th><th>Jumlah Satuan</th><th>Action</th></tr>
	 <?php
                            $no = 1;
                            
                            foreach ($dethail as $d) {
                                echo "<tr>
                                    <td>$no</td>
                                    <td>$d->no_pb</td>
                                    <td>$d->id_barang</td>
                                    <td>$d->jlh_satuan</td>
									 <td width='100'  onClick='hapus($d->id_nmr)', ><button class='btn btn-danger' >Hapus</button></td>
									</tr>";             
                                $no++;
								}
                            ?>
		   
		   
        </table>
 
          
        </div></div></div></div></div>
    </section>
</div>

<script type="text/javascript">
function hapus(id){
        $.ajax({
            url:"<?php echo base_url() ?>index.php/permintaanbarang/hapus_ajax",
            data:"id_nmr=" + id,
            success: function(html)
            {
				
				
				setTimeout(function(){// wait for 5 secs(2)
           location.reload(); // then reload the page.(3)
      }, 0001); 
				
				
                
            }
        });
    }
</script>


<script type="text/javascript">
$.ajax(function(){
url : 'index.php/permintaanbarang/update')$data,
success : function(response){
$('.id').html(response);
}
});
</script>

<script type="text/javascript">
   window.location="index.php/permintaanbarang/update,$data"; });
</script>


	    </div>


</div>



</div>

