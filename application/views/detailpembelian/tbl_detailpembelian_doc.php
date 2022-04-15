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
        <h2>Tbl_detailpembelian List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Po</th>
		<th>Jlh Ok</th>
		<th>Harga Satuan</th>
		
            </tr><?php
            foreach ($detailpembelian_data as $detailpembelian)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $detailpembelian->no_po ?></td>
		      <td><?php echo $detailpembelian->jlh_ok ?></td>
		      <td><?php echo $detailpembelian->harga_satuan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>