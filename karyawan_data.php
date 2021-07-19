<?php include "header.php"; ?>
    

<h2>Data Karyawan</h2>
<hr/>
    <div class="form-group">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    <a href="karyawan_add.php">Tambah Data</a>
    </div>
    <br/>
    <div class="table-responsive">
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
            $mysql = "SELECT * FROM tkaryawan";
            $myQry = mysqli_query($koneksi, $mysql) or die ("Query salah: ".mysqli_error($koneksi));
            $nomor =1;
            while ($kolomData = mysqli_fetch_array($myQry)){
        
        ?>
        <tr>
            <td><?php echo $nomor++; ?></td>
            <td><?php echo$kolomData['nik']; ?></td>
            <td><?php echo$kolomData['nama']; ?></td>
            <td><?php echo$kolomData['tempat_lahir']; ?></td>
            <td><?php echo$kolomData['tanggal_lahir']; ?></td>
            <td><?php echo$kolomData['no_telepon']; ?></td>
            <td><?php echo$kolomData['jabatan']; ?></td>
            <td><?php echo$kolomData['status']; ?></td>
            <td>
                <a href="karyawan_edit.php ?nik=<?php  echo $kolomData['nik'];?>" title="Edit Data" class="btn btn-primary btn-sm">
                <span class="glyphicion glyphicion-edit" aria-hidden="true"></span></a>
                <a href="karyawan_delete.php ?nik=<?php  echo $kolomData['nik'];?>" title="Hapus Data" onclick="confirm('yakin Menghapus data ini?')" class="btn btn-danger btn-sm">
                <span class="glyphicion glyphicion-trash" aria-hidden="true"></span></a>
            </td>
        </tr>
        <?php } ?>
 </table>
    </div>
    <?php include "Footer.php"; ?>