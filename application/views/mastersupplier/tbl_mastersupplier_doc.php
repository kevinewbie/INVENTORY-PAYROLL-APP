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
        <h2>Tbl_mastersupplier List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Sup</th>
		<th>Alamat Sup</th>
		<th>Telp Sup</th>
		<th>Nm Kontrak</th>
		<th>Produk</th>
		
            </tr><?php
            foreach ($mastersupplier_data as $mastersupplier)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $mastersupplier->id_sup ?></td>
		      <td><?php echo $mastersupplier->alamat_sup ?></td>
		      <td><?php echo $mastersupplier->telp_sup ?></td>
		      <td><?php echo $mastersupplier->nm_kontrak ?></td>
		      <td><?php echo $mastersupplier->produk ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>