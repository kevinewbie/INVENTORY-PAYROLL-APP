<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Input Data Pembelian</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nomor Purchase Order <?php echo form_error('no_po') ?></td><td><input type="text" readonly="" class="form-control" name="no_po" id="no_po" placeholder="No Po" value="<?php echo $no_po; ?>" /></td></tr>
	    <tr><td width='200'>Tanggal Pembelian <?php echo form_error('tgl_po') ?></td><td><input type="date" class="form-control" name="tgl_po" id="tgl_po" placeholder="Tgl Po" value="<?php echo $tgl_po; ?>" /></td></tr>
	    <tr><td width='200'>Nomor Pembelian <?php echo form_error('no_pembelian') ?></td><td><input type="text" class="form-control" name="no_pembelian" id="no_pembelian" placeholder="No Pembelian" value="<?php echo $no_pembelian; ?>" /></td></tr>
	    <tr><td width='200'>Id Supplier <?php echo form_error('id_sup') ?></td><td><input type="text" class="form-control" name="id_sup" id="id_sup" placeholder="Id Sup" value="<?php echo $id_sup; ?>" /></td></tr>
	    <tr><td width='200'>Cara Bayar <?php echo form_error('cara_bayar') ?></td><td><input type="text" class="form-control" name="cara_bayar" id="cara_bayar" placeholder="Cara Bayar" value="<?php echo $cara_bayar; ?>" /></td></tr>
	    <tr><td width='200'>Ongkir <?php echo form_error('ongkir') ?></td><td><input type="text" class="form-control" name="ongkir" id="ongkir" placeholder="Ongkir" value="<?php echo $ongkir; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_nmr" value="<?php echo $id_nmr; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('forminputpembelian') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
	<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Input Detail Pembelian 
</button>
</td></tr>
	</table></form>        </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pembelian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <?php echo form_open ('forminputpembelian/pembelian_action')?>
        <table class="table table-bordered" style="margin-bottom: 10px">
		<input value="<?php echo $no_detail ?>"  type="hidden" name="no_detail">
				<td>Nama Barang</td><td><?php echo datalist_dinamis('barang', 'tbl_forminputbarang', 'nm_barang') ?></td></tr></td> </tr>
		<tr><td>Jumlah</td> <td>   <input type="text" id='jlh_ok' required   placeholder="Masukkan Jumlah" name="jlh_ok" class="form-control ui-autocomplete-input"></td> </tr>
		<tr><td>Harga Satuan</td> <td>   <input type="text" id='harga_satuan' required   placeholder="Masukkan Harga Satuan" name="harga_satuan" class="form-control ui-autocomplete-input"></td> </tr>
		</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
	  </form>
    </div>
  </div>
</div>
	
	
	
	
	
       
			 <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">Detail Barang Pembelian</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            
        <table class="table table-bordered" style="margin-bottom: 10px">
           <tr><th>No</th><th>Barang</th><th>Jumlah Oke</th><th>Harga Satuan</th><th>Action</th></tr>
		  <?php
                            $no = 1;
                            
                            foreach ($dethail as $d) {
                                echo "<tr>
                                    <td>$no</td>
                                    <td>$d->barang</td>
                                    <td>$d->jlh_ok</td>
                                    <td>$d->harga_satuan</td>
									 <td width='100'  onClick='hapus($d->id_nmr)', ><button class='btn btn-danger' >Hapus</button></td>
									</tr>";             
                                $no++;
								}
                            ?>
		   
		   
        </table>
 
          
        </div></div></div></div></div>
    </section>
</div>

<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>



<script type="text/javascript">
function hapus(id){
        $.ajax({
            url:"<?php echo base_url() ?>index.php/forminputpembelian/hapus_ajax",
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
url : 'index.php/forminputpembelian/detail')$data,
success : function(response){
$('.id').html(response);
}
});
</script>

<script type="text/javascript">
   window.location="index.php/forminputpembelian/detail,$data"; });
</script>