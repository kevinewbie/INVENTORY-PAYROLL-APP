<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">Kelola Master Barang (Form Input Barang)</h3>
                    </div>
					 
				
      
		<?php
if($brgMelebihiBatas){
	echo '<div class="alert alert-danger">
  <strong></strong>Ada Barang yang melebihi stok maksimal
</div>';
	
}


?>

		
		
		
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('forminputbarang/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
		<?php echo anchor(site_url('forminputbarang/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
           <?php echo anchor(site_url('forminputbarang/print_pdf'), '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Laporan Pdf', 'class="btn btn-danger btn-sm"'); ?>
		</div>
            </div>
            <div class='col-md-3'>
            <form action="<?php echo site_url('forminputbarang/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('forminputbarang'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
            </div>
        
   
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Barang</th>
		<th>Nama Barang</th>
		<th>Satuan</th>
		<th>Minimal stok</th>
		<th>Maximal stok</th>
		<th>Stok Tersedia</th>
		<th>Kisaran Harga Satuan</th>
		<th>Action</th>
            </tr><?php
            foreach ($forminputbarang_data as $forminputbarang)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
			<td><?php echo $forminputbarang->id_barang ?></td>
			<td><?php echo $forminputbarang->nm_barang ?></td>
			<td><?php echo $forminputbarang->satuan ?></td>
			<td><?php echo $forminputbarang->minstok ?></td>
			<td><?php echo $forminputbarang->maxstok ?></td>
			<td><?php echo $forminputbarang->stoktersedia ?></td>
			<td><?php echo $forminputbarang->kisaran_hargasatuan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
			
				echo anchor(site_url('forminputbarang/update/'.$forminputbarang->id_nmr),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('forminputbarang/delete/'.$forminputbarang->id_nmr),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
		 <div class="capos">
		 </div>
        <div class="row">
            <div class="col-md-6">
                
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>



<script type="text/javascript">
 function pemberi_posisi(){
       
        $.ajax({
            url:"<?php echo base_url(); ?>index.php/forminputbarang/dikit",
            
            success: function(html)
            {
                $(".capos").html(html);
            }
        });
    }
 </script>
 