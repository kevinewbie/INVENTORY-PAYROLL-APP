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
        <h2>Tbl_forminputbarang List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Barang</th>
		<th>Nm Barang</th>
		<th>Satuan</th>
		<th>Minstok</th>
		<th>Maxstok</th>
		<th>Stoktersedia</th>
		<th>Kisaran Hargasatuan</th>
		
            </tr><?php
            foreach ($forminputbarang_data as $forminputbarang)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $forminputbarang->id_barang ?></td>
		      <td><?php echo $forminputbarang->nm_barang ?></td>
		      <td><?php echo $forminputbarang->satuan ?></td>
		      <td><?php echo $forminputbarang->minstok ?></td>
		      <td><?php echo $forminputbarang->maxstok ?></td>
		      <td><?php echo $forminputbarang->stoktersedia ?></td>
		      <td><?php echo $forminputbarang->kisaran_hargasatuan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>