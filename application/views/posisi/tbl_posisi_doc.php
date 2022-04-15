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
        <h2>Tbl_posisi List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kd Posisi</th>
		<th>Nama Posisi</th>
		<th>Keterangan</th>
		<th>Tipe</th>
		
            </tr><?php
            foreach ($posisi_data as $posisi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $posisi->kd_posisi ?></td>
		      <td><?php echo $posisi->nama_posisi ?></td>
		      <td><?php echo $posisi->keterangan ?></td>
		      <td><?php echo $posisi->tipe ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>