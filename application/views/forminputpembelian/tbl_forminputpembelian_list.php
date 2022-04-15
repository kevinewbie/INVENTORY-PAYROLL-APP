<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">Kelola Data Pembelian</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('forminputpembelian/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
		<?php echo anchor(site_url('forminputpembelian/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
</div>
            </div>
            <div class='col-md-3'>
            <form action="<?php echo site_url('forminputpembelian/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('forminputpembelian'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nomor Purchase Order</th>
		<th>Tanggal Pembelian</th>
		<th>Nomor Pembelian</th>
		<th>Id Supplier</th>
		<th>Cara Bayar</th>
		<th>Ongkir</th>
		<th>Action</th>
            </tr><?php
            foreach ($forminputpembelian_data as $forminputpembelian)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
			<td><?php echo $forminputpembelian->no_po ?></td>
			<td><?php echo $forminputpembelian->tgl_po ?></td>
			<td><?php echo $forminputpembelian->no_pembelian ?></td>
			<td><?php echo $forminputpembelian->id_sup ?></td>
			<td><?php echo $forminputpembelian->cara_bayar ?></td>
			<td><?php echo $forminputpembelian->ongkir ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('forminputpembelian/update/'.$forminputpembelian->id_nmr),'<i class="fa fa-wpforms" aria-hidden="true"></i>UPDATE & DETAIL', 'class="btn btn-warning btn-sm"'); 
                
				
				echo '  '; 
				echo anchor(site_url('forminputpembelian/delete/'.$forminputpembelian->id_nmr),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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