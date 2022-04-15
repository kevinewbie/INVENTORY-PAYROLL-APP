<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Tbl_asettanah List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kd Jenis</th>
		<th>Kd Tanah</th>
		<th>Nama Tanah</th>
		<th>Lokasi</th>
		<th>Asal</th>
		<th>Nomor Sertifikat</th>
		<th>Luas</th>
		<th>Tahun</th>
		<th>Kondisi</th>
		<th>Harga</th>
		<th>Status</th>
		<th>Ket</th>
		
            </tr><?php
            foreach ($asettanah_data as $asettanah)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $asettanah->kd_jenis ?></td>
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
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>