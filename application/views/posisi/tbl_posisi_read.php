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
        <h2 style="margin-top:0px">Tbl_posisi Read</h2>
        <table class="table">
	    <tr><td>Kd Posisi</td><td><?php echo $kd_posisi; ?></td></tr>
	    <tr><td>Nama Posisi</td><td><?php echo $nama_posisi; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('posisi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>