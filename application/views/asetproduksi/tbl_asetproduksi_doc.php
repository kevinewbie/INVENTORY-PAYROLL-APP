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
        <h2>Tbl_asetproduksi List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kd Jenis</th>
		<th>Kd Aproduksi</th>
		<th>Nama AsetProduksi</th>
		<th>Merk</th>
		<th>Asal</th>
		<th>Tahun</th>
		<th>Jumlah</th>
		<th>Satuan</th>
		<th>Ukuran</th>
		<th>Status</th>
		<th>Kondisi</th>
		<th>Harga</th>
		<th>Spek Lain</th>
		<th>Ket</th>
		
            </tr><?php
            foreach ($asetproduksi_data as $asetproduksi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $asetproduksi->kd_jenis ?></td>
		      <td><?php echo $asetproduksi->kd_Aproduksi ?></td>
		      <td><?php echo $asetproduksi->nama_AsetProduksi ?></td>
		      <td><?php echo $asetproduksi->merk ?></td>
		      <td><?php echo $asetproduksi->asal ?></td>
		      <td><?php echo $asetproduksi->tahun ?></td>
		      <td><?php echo $asetproduksi->jumlah ?></td>
		      <td><?php echo $asetproduksi->satuan ?></td>
		      <td><?php echo $asetproduksi->ukuran ?></td>
		      <td><?php echo $asetproduksi->status ?></td>
		      <td><?php echo $asetproduksi->kondisi ?></td>
		      <td><?php echo $asetproduksi->harga ?></td>
		      <td><?php echo $asetproduksi->spek_lain ?></td>
		      <td><?php echo $asetproduksi->ket ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>