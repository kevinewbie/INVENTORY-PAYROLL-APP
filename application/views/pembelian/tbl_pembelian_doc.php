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
        <h2>Tbl_pembelian List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Po</th>
		<th>Tgl Po</th>
		<th>No Pembelian</th>
		<th>Id Sup</th>
		<th>Carabayar</th>
		<th>Ongkir</th>
		<th>Barang</th>
		<th>Jlh Ok</th>
		<th>Harga Satuan</th>
		
            </tr><?php
            foreach ($pembelian_data as $pembelian)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pembelian->no_po ?></td>
		      <td><?php echo $pembelian->tgl_po ?></td>
		      <td><?php echo $pembelian->no_pembelian ?></td>
		      <td><?php echo $pembelian->id_sup ?></td>
		      <td><?php echo $pembelian->carabayar ?></td>
		      <td><?php echo $pembelian->ongkir ?></td>
		      <td><?php echo $pembelian->barang ?></td>
		      <td><?php echo $pembelian->jlh_ok ?></td>
		      <td><?php echo $pembelian->harga_satuan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>