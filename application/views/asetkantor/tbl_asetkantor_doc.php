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
        <h2>Tbl_asetkantor List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kd Jenis</th>
		<th>Kd AKantor</th>
		<th>Nm Akantor</th>
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
            foreach ($asetkantor_data as $asetkantor)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $asetkantor->kd_jenis ?></td>
		      <td><?php echo $asetkantor->kd_AKantor ?></td>
		      <td><?php echo $asetkantor->nm_Akantor ?></td>
		      <td><?php echo $asetkantor->merk ?></td>
		      <td><?php echo $asetkantor->asal ?></td>
		      <td><?php echo $asetkantor->tahun ?></td>
		      <td><?php echo $asetkantor->jumlah ?></td>
		      <td><?php echo $asetkantor->satuan ?></td>
		      <td><?php echo $asetkantor->ukuran ?></td>
		      <td><?php echo $asetkantor->status ?></td>
		      <td><?php echo $asetkantor->kondisi ?></td>
		      <td><?php echo $asetkantor->harga ?></td>
		      <td><?php echo $asetkantor->spek_lain ?></td>
		      <td><?php echo $asetkantor->ket ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>