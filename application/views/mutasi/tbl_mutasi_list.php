<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">Kelola Data Mutasi</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('mutasi/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('mutasi/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
        <?php echo anchor(site_url('mutasi/c_mutasi'), '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Laporan Pdf', 'class="btn btn-danger btn-sm"'); ?>
        </div>
            </div>
            <div class='col-md-3'>
            <form action="<?php echo site_url('mutasi/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('mutasi'); ?>" class="btn btn-default">Reset</a>
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
		<th>Kd Mutasi</th>
		<th>Jenis Aset</th>
		<th>Nama Bmutasi</th>
		<th>Jumlah</th>
		<th>Posisi Asetawal</th>
		<th>Posisi Asetakhir</th>
		<th>Kondisi</th>
		<th>Penanggungjawab</th>
		<th>Nokontrak</th>
		<th>Ket</th>
		<th>Action</th>
            </tr><?php
            foreach ($mutasi_data as $mutasi)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
			<td><?php echo $mutasi->kd_mutasi ?></td>
			<td><?php echo $mutasi->nama_alpro ?></td>
			<td><?php echo $mutasi->nama_bmutasi ?></td>
			<td><?php echo $mutasi->jumlah ?></td>
			<td><?php echo $mutasi->posisi_asetawal ?></td>
			<td><?php echo $mutasi->posisi_asetakhir ?></td>
			<td><?php echo $mutasi->kondisi ?></td>
			<td><?php echo $mutasi->penanggungjawab ?></td>
			<td><?php echo $mutasi->nokontrak ?></td>
			<td><?php echo $mutasi->ket ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('mutasi/read/'.$mutasi->id_mutasi),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('mutasi/update/'.$mutasi->id_mutasi),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('mutasi/delete/'.$mutasi->id_mutasi),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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