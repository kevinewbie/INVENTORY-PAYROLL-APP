<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">Kelola Barang Masuk</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            
        <table class="table table-bordered" style="margin-bottom: 10px">
        <tr><td width="200">Id Barang Masuk</td><td><?php echo $masuk ['id_barangmasuk']?>  </td></tr>
		 <tr><td width="200">Tanggal Masuk</td><td><?php echo $masuk ['tgl_barangmasuk']?></td></tr>
			 <tr><td width="200">Nomor Faktur</td><td><?php echo $masuk ['no_faktur']?> </td></tr>
		
		
        </table>
		
	<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Input Detail Permintaan 
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Barang Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
		<?php echo form_open ('barangmasuk/masuk_action')?>
        <table class="table table-bordered" style="margin-bottom: 10px">
		<input value="<?php echo $no_detail ?>"  type="hidden" name="no_detail">
		<td><input value="<?php echo $masuk ['id_barangmasuk'] ?>"  type="hidden" readonly name="id_barangmasuk"></td> </tr>
		<td>Nama Barang</td><td><?php echo datalist_dinamis('id_barang', 'tbl_forminputbarang', 'nm_barang') ?></td></tr></td> </tr>
		<tr><td>Jumlah Masuk</td><td> <input type="text" id='jlh_masuk' required   placeholder="Masukkan Jumlah Satuan" name="jlh_masuk" class="form-control ui-autocomplete-input"></td> </tr>
		
		
		
		
	<td>Nama Posisi</td><td><?php echo cmb_pbarang('kd_posisi', 'tbl_posisi', 'nama_posisi', 'nama_posisi')?></td></tr></td> </tr>
		
		</table>
		 <div class="capos">
		 </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
	  </form>
    </div>
  </div>
</div>
	
	
	
	
	
        </div>
        </div></div></div>
		
		
			
			 <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">Detail Barang Masuk</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            
        <table class="table table-bordered" style="margin-bottom: 10px">
           <tr><th>No</th><th>Nama Barang</th><th>Jumlah Masuk</th><th>Kode Posisi</th><th>No Kontrak</th><th>Action</th></tr>

		    <?php
                            $no = 1;
                            
                            foreach ($ditel as $d) {
                                echo "<tr>
                                    <td>$no</td>
                                    <td>$d->id_barang</td>
                                    <td>$d->jlh_masuk</td>
                                    <td>$d->kd_posisi</td>
									<td>$d->no_kontrak</td>
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
            url:"<?php echo base_url() ?>index.php/barangmasuk/hapus_ajax",
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
 function drokdon(){
        var kd_posisi = $('#kd_posisi').val();
        $.ajax({
            url:"<?php echo base_url(); ?>index.php/barangmasuk/hide_kontrak",
            data:"kd_posisi="+kd_posisi.substr(0,1) ,
            success: function(html)
            {
               $(".capos").html(html);
            }
        });
    }
 </script>
 

