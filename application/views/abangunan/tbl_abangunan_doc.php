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
        <h2>Tbl_abangunan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kd Jenis</th>
		<th>Kode Bangunan</th>
		<th>Nama Bangunan</th>
		<th>Lokasi</th>
		<th>Asal</th>
		<th>No Sertifikat</th>
		<th>Luas</th>
		<th>Tahun</th>
		<th>Kondisi</th>
		<th>Harga</th>
		<th>Status</th>
		<th>Ket</th>
		
            </tr><?php
            foreach ($abangunan_data as $abangunan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $abangunan->kd_jenis ?></td>
		      <td><?php echo $abangunan->kode_bangunan ?></td>
		      <td><?php echo $abangunan->nama_bangunan ?></td>
		      <td><?php echo $abangunan->lokasi ?></td>
		      <td><?php echo $abangunan->asal ?></td>
		      <td><?php echo $abangunan->no_sertifikat ?></td>
		      <td><?php echo $abangunan->luas ?></td>
		      <td><?php echo $abangunan->tahun ?></td>
		      <td><?php echo $abangunan->kondisi ?></td>
		      <td><?php echo $abangunan->harga ?></td>
		      <td><?php echo $abangunan->status ?></td>
		      <td><?php echo $abangunan->ket ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>