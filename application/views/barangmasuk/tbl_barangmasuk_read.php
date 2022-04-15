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
        <h2 style="margin-top:0px">Tbl_barangmasuk Read</h2>
        <table class="table">
	    <tr><td>Id Barangmasuk</td><td><?php echo $id_barangmasuk; ?></td></tr>
	    <tr><td>Tgl Barangmasuk</td><td><?php echo $tgl_barangmasuk; ?></td></tr>
	    <tr><td>No Faktur</td><td><?php echo $no_faktur; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('barangmasuk') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>