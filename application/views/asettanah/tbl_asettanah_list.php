<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">Kelola Aset Tanah</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('asettanah/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
		<?php echo anchor(site_url('asettanah/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
		</div>
            </div>
            <div class='col-md-3'>
            <form action="<?php echo site_url('asettanah/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('asettanah'); ?>" class="btn btn-default">Reset</a>
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
		
		<th>Kode Aset</th>
		<th>Nama Aset </th>
		<th>Lokasi</th>
		<th>Asal</th>
		<th>Nomor Sertifikat</th>
		<th>Luas</th>
		<th>Tahun</th>
		<th>Kondisi</th>
		<th>Harga</th>
		<th>Status</th>
		<th>Ket</th>
		<th>Action</th>
            </tr><?php
            foreach ($asettanah_data as $asettanah)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
			
			<td><?php echo $asettanah->kd_tanah ?></td>
			<td><?php echo $asettanah->nama_tanah ?></td>
			<td><?php echo $asettanah->lokasi ?></td>
			<td><?php echo $asettanah->asal ?></td>
			<td><?php echo $asettanah->nomor_sertifikat ?></td>
			<td><?php echo $asettanah->luas ?></td>
			<td><?php echo $asettanah->tahun ?></td>
			<td><?php echo $asettanah->kondisi ?></td>
			<td><?php echo $asettanah->harga ?></td>
			<td><?php echo $asettanah->status ?></td>
			<td><?php echo $asettanah->ket ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('asettanah/read/'.$asettanah->id_asettanah),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('asettanah/update/'.$asettanah->id_asettanah),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('asettanah/delete/'.$asettanah->id_asettanah),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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