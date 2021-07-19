<?php include "header.php"; ?>
<?php
$id =$_GET['id'];
$sql=mysqli_query($koneksi, "SELECT * FROM gudang WHERE id='$id'");
$row =mysqli_fetch_assoc($sql);
?>

<h2>Detail Distribusi &raquo; <?php echo $row['nama_gudang'];?></h2>
<hr/>
<table class="table table-striped table-condensed">
    <tr>
        <th width="20%">Nama Gudang</th>
        <td width="2%">:</td>
        <td><?php echo $row['nama_gudang'];?></td>
    </tr>

    <tr>
        <th>Lokasi Gudang</th>
        <td>:</td>
        <td><?php echo $row['lokasi_gudang'];?></td>
    </tr>

    <tr>
        <th>Luas Gudang</th>
        <td>:</td>
        <td><?php echo $row['luas_gudang'];?> m<sup>2</sup></td>
    </tr>
</table>
</table>

<h4>Pegawai yang terdistribusi pada Gudang ini yaitu:</h4>
<div class="table=responsive">
<table class="table table-striped table-hover">
<tr>
    <th>No</th>
    <th>NIK</th>
    <th>Nama</th>
    <th>Tempat Lahir</th>
    <th>Tanggal Lahir</th>
    <th>No Telepon</th>
    <th>Jabatan</th>
    <th>Status</th>
    <th>Tools</th>
</tr>

    <?php
        $mySql = "SELECT k_gudang.id,k_gudang.id_gudang ,tkaryawan.*
        FROM k_gudang
        LEFT JOIN tkaryawan ON k_gudang.nik=tkaryawan.nik
        WHERE k_gudang.id_gudang='$id'";
    $myQry = mysqli_query($koneksi,$mySql) or die("Query salah:".mysqli_error($koneksi));
    $nomor =1;
    while ($kolomData = mysqli_fetch_array($myQry)){
    ?>
     
     <tr>
     <td><?php echo $nomor++; ?></td>
     <td><?php echo $kolomData['nik'];?></td>
     <td><?php echo $kolomData['nama'];?></td>
     <td><?php echo $kolomData['tempat_lahir'];?></td>
     <td><?php echo IndonesiaTgl($kolomData['tanggal_lahir']);?></td>
     <td><?php echo $kolomData['no_telepon'];?></td>
     <td><?php echo $kolomData['jabatan'];?></td>
     <td><?php echo $kolomData['status'];?></td>
     <td>
     <a href="distribusi_delete.php?id=<?php echo $kolomData['id'];?>" title="Hapus Data" class="btn btn-primary btn-sm">
     <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
     </td>
     </tr>
<?php } ?>
</table>
</div>
<img src="img/btn_print.png" width="25" onclick="window.print();">
     <?php include "Footer.php"; ?>
