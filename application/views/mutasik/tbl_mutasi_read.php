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
        <h2 style="margin-top:0px">Tbl_mutasi Read</h2>
        <table class="table">
	    <tr><td>Kd Mutasi</td><td><?php echo $kd_mutasi; ?></td></tr>
	    <tr><td>Nama Alpro</td><td><?php echo $nama_alpro; ?></td></tr>
	    <tr><td>Nama Bmutasi</td><td><?php echo $nama_bmutasi; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
	    <tr><td>Posisi Aset</td><td><?php echo $posisi_aset; ?></td></tr>
	    <tr><td>Kondisi</td><td><?php echo $kondisi; ?></td></tr>
	    <tr><td>Penanggungjawab</td><td><?php echo $penanggungjawab; ?></td></tr>
	    <tr><td>Nokontrak</td><td><?php echo $nokontrak; ?></td></tr>
	    <tr><td>Ket</td><td><?php echo $ket; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mutasik') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>