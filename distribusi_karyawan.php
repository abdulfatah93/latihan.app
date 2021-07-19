<?php include "header.php"; ?>
    

<h2>Pilih karyawan yang akan didistribusikan</h2>
<hr/>
   
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
                <a href="distribusi_add.php?nik=<?php echo $kolomData['nik'];?>" 
                 title="Tambah Data" class="btn btn-primary btn-sm">
                 <span class="glyphicon glyphicon-forward" aria-hidden="true"></span></a>
            </td>
        </tr>
        <?php } ?>
 </table>
    </div>
    <?php include "Footer.php"; ?>