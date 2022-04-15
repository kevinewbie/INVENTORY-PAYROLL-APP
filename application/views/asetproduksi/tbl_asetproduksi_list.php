<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">Kelola Data Aset Produksi</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('asetproduksi/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
		<?php echo anchor(site_url('asetproduksi/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
		</div>
            </div>
            <div class='col-md-3'>
            <form action="<?php echo site_url('asetproduksi/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('asetproduksi'); ?>" class="btn btn-default">Reset</a>
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
		
		<th>Kode Aset Produksi</th>
		<th>Nama Aset Produksi</th>
		<th>Merk</th>
		<th>Asal</th>
		<th>Tahun</th>
		<th>Jumlah</th>
		<th>Satuan</th>
		<th>Ukuran</th>
		<th>Status</th>
		<th>Kondisi</th>
		<th>Harga</th>
		<th>Spek Lain</th>
		<th>Ket</th>
		<th>Action</th>
            </tr><?php
            foreach ($asetproduksi_data as $asetproduksi)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
			
			<td><?php echo $asetproduksi->kd_Aproduksi ?></td>
			<td><?php echo $asetproduksi->nama_AsetProduksi ?></td>
			<td><?php echo $asetproduksi->merk ?></td>
			<td><?php echo $asetproduksi->asal ?></td>
			<td><?php echo $asetproduksi->tahun ?></td>
			<td><?php echo $asetproduksi->jumlah ?></td>
			<td><?php echo $asetproduksi->satuan ?></td>
			<td><?php echo $asetproduksi->ukuran ?></td>
			<td><?php echo $asetproduksi->status ?></td>
			<td><?php echo $asetproduksi->kondisi ?></td>
			<td><?php echo $asetproduksi->harga ?></td>
			<td><?php echo $asetproduksi->spek_lain ?></td>
			<td><?php echo $asetproduksi->ket ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('asetproduksi/read/'.$asetproduksi->id_asetproduksi),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('asetproduksi/update/'.$asetproduksi->id_asetproduksi),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('asetproduksi/delete/'.$asetproduksi->id_asetproduksi),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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