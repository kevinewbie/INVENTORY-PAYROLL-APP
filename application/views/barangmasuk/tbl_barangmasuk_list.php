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
            <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('barangmasuk/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('barangmasuk/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
        <?php echo anchor(site_url('barangmasuk/c_laporanm'), '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Laporan Pdf', 'class="btn btn-danger btn-sm"'); ?>
</div>
            </div>
            <div class='col-md-3'>
            <form action="<?php echo site_url('barangmasuk/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('barangmasuk'); ?>" class="btn btn-default">Reset</a>
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
		<th>Id Barang Masuk</th>
		<th>Tanggal Barang Masuk</th>
		<th>Nomor Faktur</th>
		<th>Action</th>
            </tr><?php
            foreach ($barangmasuk_data as $barangmasuk)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
			<td><?php echo $barangmasuk->id_barangmasuk ?></td>
			<td><?php echo $barangmasuk->tgl_barangmasuk ?></td>
			<td><?php echo $barangmasuk->no_faktur ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('barangmasuk/detail/'.$barangmasuk->id_nmr),'<i class="fa fa-wpforms" aria-hidden="true"></i>  Detail Barang', 'class="btn btn-warning btn-sm"');
	
				echo '  '; 
				echo anchor(site_url('barangmasuk/delete/'.$barangmasuk->id_nmr),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
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