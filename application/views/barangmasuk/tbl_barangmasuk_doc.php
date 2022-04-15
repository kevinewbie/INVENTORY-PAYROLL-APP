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
        <h2>Tbl_barangmasuk List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Barangmasuk</th>
		<th>Tgl Barangmasuk</th>
		<th>No Faktur</th>
		
            </tr><?php
            foreach ($barangmasuk_data as $barangmasuk)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $barangmasuk->id_barangmasuk ?></td>
		      <td><?php echo $barangmasuk->tgl_barangmasuk ?></td>
		      <td><?php echo $barangmasuk->no_faktur ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>