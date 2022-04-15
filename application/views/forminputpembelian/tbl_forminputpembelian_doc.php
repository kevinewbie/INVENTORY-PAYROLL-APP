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
        <h2>Tbl_forminputpembelian List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Po</th>
		<th>Tgl Po</th>
		<th>No Pembelian</th>
		<th>Id Sup</th>
		<th>Cara Bayar</th>
		<th>Ongkir</th>
		
            </tr><?php
            foreach ($forminputpembelian_data as $forminputpembelian)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $forminputpembelian->no_po ?></td>
		      <td><?php echo $forminputpembelian->tgl_po ?></td>
		      <td><?php echo $forminputpembelian->no_pembelian ?></td>
		      <td><?php echo $forminputpembelian->id_sup ?></td>
		      <td><?php echo $forminputpembelian->cara_bayar ?></td>
		      <td><?php echo $forminputpembelian->ongkir ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>