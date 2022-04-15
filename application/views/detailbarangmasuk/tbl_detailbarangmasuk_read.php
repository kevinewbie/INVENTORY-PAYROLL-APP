<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tbl_detailbarangmasuk Read</h2>
        <table class="table">
	    <tr><td>Id Barangmasuk</td><td><?php echo $id_barangmasuk; ?></td></tr>
	    <tr><td>Id Barang</td><td><?php echo $id_barang; ?></td></tr>
	    <tr><td>Jlh Masuk</td><td><?php echo $jlh_masuk; ?></td></tr>
	    <tr><td>Kd Posisi</td><td><?php echo $kd_posisi; ?></td></tr>
	    <tr><td>No Kontrak</td><td><?php echo $no_kontrak; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('detailbarangmasuk') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>