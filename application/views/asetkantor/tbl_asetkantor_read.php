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
        <h2 style="margin-top:0px">Tbl_asetkantor Read</h2>
        <table class="table">
	    <tr><td>Kd Jenis</td><td><?php echo $kd_jenis; ?></td></tr>
	    <tr><td>Kd AKantor</td><td><?php echo $kd_AKantor; ?></td></tr>
	    <tr><td>Nm Akantor</td><td><?php echo $nm_Akantor; ?></td></tr>
	    <tr><td>Merk</td><td><?php echo $merk; ?></td></tr>
	    <tr><td>Asal</td><td><?php echo $asal; ?></td></tr>
	    <tr><td>Tahun</td><td><?php echo $tahun; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
	    <tr><td>Satuan</td><td><?php echo $satuan; ?></td></tr>
	    <tr><td>Ukuran</td><td><?php echo $ukuran; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Kondisi</td><td><?php echo $kondisi; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
	    <tr><td>Spek Lain</td><td><?php echo $spek_lain; ?></td></tr>
	    <tr><td>Ket</td><td><?php echo $ket; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('asetkantor') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>