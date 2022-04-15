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
        <h2 style="margin-top:0px">Tbl_pembelian Read</h2>
        <table class="table">
	    <tr><td>No Po</td><td><?php echo $no_po; ?></td></tr>
	    <tr><td>Tgl Po</td><td><?php echo $tgl_po; ?></td></tr>
	    <tr><td>No Pembelian</td><td><?php echo $no_pembelian; ?></td></tr>
	    <tr><td>Id Sup</td><td><?php echo $id_sup; ?></td></tr>
	    <tr><td>Carabayar</td><td><?php echo $carabayar; ?></td></tr>
	    <tr><td>Ongkir</td><td><?php echo $ongkir; ?></td></tr>
	    <tr><td>Barang</td><td><?php echo $barang; ?></td></tr>
	    <tr><td>Jlh Ok</td><td><?php echo $jlh_ok; ?></td></tr>
	    <tr><td>Harga Satuan</td><td><?php echo $harga_satuan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pembelian') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>