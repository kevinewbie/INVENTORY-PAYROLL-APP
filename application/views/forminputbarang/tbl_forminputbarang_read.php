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
        <h2 style="margin-top:0px">Tbl_forminputbarang Read</h2>
        <table class="table">
	    <tr><td>Id Barang</td><td><?php echo $id_barang; ?></td></tr>
	    <tr><td>Nm Barang</td><td><?php echo $nm_barang; ?></td></tr>
	    <tr><td>Satuan</td><td><?php echo $satuan; ?></td></tr>
	    <tr><td>Minstok</td><td><?php echo $minstok; ?></td></tr>
	    <tr><td>Maxstok</td><td><?php echo $maxstok; ?></td></tr>
	    <tr><td>Stoktersedia</td><td><?php echo $stoktersedia; ?></td></tr>
	    <tr><td>Kisaran Hargasatuan</td><td><?php echo $kisaran_hargasatuan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('forminputbarang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>