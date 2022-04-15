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
        <h2 style="margin-top:0px">Tbl_permintaanbarang Read</h2>
        <table class="table">
	    <tr><td>Nomor Pb</td><td><?php echo $nomor_pb; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Status Pb</td><td><?php echo $status_pb; ?></td></tr>
	    <tr><td>Kd Posisi</td><td><?php echo $kd_posisi; ?></td></tr>
	    <tr><td>No Kontrak</td><td><?php echo $no_kontrak; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('permintaanbarang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>