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
        <h2 style="margin-top:0px">Tbl_detailpbarang Read</h2>
        <table class="table">
	    <tr><td>No Detail</td><td><?php echo $no_detail; ?></td></tr>
	    <tr><td>No Pb</td><td><?php echo $no_pb; ?></td></tr>
	    <tr><td>Id Barang</td><td><?php echo $id_barang; ?></td></tr>
	    <tr><td>Jlh Satuan</td><td><?php echo $jlh_satuan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('detailpbarang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>