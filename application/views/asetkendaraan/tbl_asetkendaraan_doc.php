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
        <h2>Tbl_asetkendaraan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kd Jenis</th>
		<th>Kd Kendaraan</th>
		<th>Nm Akantor</th>
		<th>Merk</th>
		<th>Asal</th>
		<th>Tahun</th>
		<th>Jumlah</th>
		<th>Status</th>
		<th>Kondisi</th>
		<th>Harga</th>
		<th>Nomor Rangka</th>
		<th>Nomor Polisi</th>
		<th>Nomor Bpkb</th>
		<th>Spek Lain</th>
		<th>Ket</th>
		
            </tr><?php
            foreach ($asetkendaraan_data as $asetkendaraan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $asetkendaraan->kd_jenis ?></td>
		      <td><?php echo $asetkendaraan->kd_Kendaraan ?></td>
		      <td><?php echo $asetkendaraan->nm_Akantor ?></td>
		      <td><?php echo $asetkendaraan->merk ?></td>
		      <td><?php echo $asetkendaraan->asal ?></td>
		      <td><?php echo $asetkendaraan->tahun ?></td>
		      <td><?php echo $asetkendaraan->jumlah ?></td>
		      <td><?php echo $asetkendaraan->status ?></td>
		      <td><?php echo $asetkendaraan->kondisi ?></td>
		      <td><?php echo $asetkendaraan->harga ?></td>
		      <td><?php echo $asetkendaraan->nomor_Rangka ?></td>
		      <td><?php echo $asetkendaraan->nomor_polisi ?></td>
		      <td><?php echo $asetkendaraan->nomor_bpkb ?></td>
		      <td><?php echo $asetkendaraan->spek_lain ?></td>
		      <td><?php echo $asetkendaraan->ket ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>