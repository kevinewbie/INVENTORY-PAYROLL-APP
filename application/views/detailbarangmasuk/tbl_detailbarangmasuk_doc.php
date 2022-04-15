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
        <h2>Tbl_detailbarangmasuk List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Barangmasuk</th>
		<th>Id Barang</th>
		<th>Jlh Masuk</th>
		<th>Kd Posisi</th>
		<th>No Kontrak</th>
		
            </tr><?php
            foreach ($detailbarangmasuk_data as $detailbarangmasuk)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $detailbarangmasuk->id_barangmasuk ?></td>
		      <td><?php echo $detailbarangmasuk->id_barang ?></td>
		      <td><?php echo $detailbarangmasuk->jlh_masuk ?></td>
		      <td><?php echo $detailbarangmasuk->kd_posisi ?></td>
		      <td><?php echo $detailbarangmasuk->no_kontrak ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>