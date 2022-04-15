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
        <h2>Tbl_barangkeluar List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Barangkeluar</th>
		<th>Tgl Barangkeluar</th>
		<th>Id Barang</th>
		<th>Jumlah Barangkeluar</th>
		<th>Ket</th>
		<th>Kode Posisi</th>
		<th>Kode Pekerjaan</th>
		
            </tr><?php
            foreach ($barangkeluar_data as $barangkeluar)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $barangkeluar->id_barangkeluar ?></td>
		      <td><?php echo $barangkeluar->tgl_barangkeluar ?></td>
		      <td><?php echo $barangkeluar->id_barang ?></td>
		      <td><?php echo $barangkeluar->jumlah_barangkeluar ?></td>
		      <td><?php echo $barangkeluar->ket ?></td>
		      <td><?php echo $barangkeluar->kode_posisi ?></td>
		      <td><?php echo $barangkeluar->kode_pekerjaan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>