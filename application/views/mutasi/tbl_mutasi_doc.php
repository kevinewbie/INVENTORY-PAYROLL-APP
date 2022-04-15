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
        <h2>Tbl_mutasi List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kd Mutasi</th>
		<th>Nama Alpro</th>
		<th>Nama Bmutasi</th>
		<th>Jumlah</th>
		<th>Posisi Aset</th>
		<th>Kondisi</th>
		<th>Penanggungjawab</th>
		<th>Nokontrak</th>
		<th>Ket</th>
		
            </tr><?php
            foreach ($mutasi_data as $mutasi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $mutasi->kd_mutasi ?></td>
		      <td><?php echo $mutasi->nama_alpro ?></td>
		      <td><?php echo $mutasi->nama_bmutasi ?></td>
		      <td><?php echo $mutasi->jumlah ?></td>
		      <td><?php echo $mutasi->posisi_aset ?></td>
		      <td><?php echo $mutasi->kondisi ?></td>
		      <td><?php echo $mutasi->penanggungjawab ?></td>
		      <td><?php echo $mutasi->nokontrak ?></td>
		      <td><?php echo $mutasi->ket ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>