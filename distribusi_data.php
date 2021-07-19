<?php include "header.php"; ?>
    

<h2>Distribusi Karyawan</h2>
<hr/>
    <div class="form-group">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    <a href="distribusi_karyawan.php">Tambah Data</a>
    </div>
    <br/>
    <div class="table-responsive">
    <table class="table table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Nama Gudang</th>
            <th>Lokasi Gudang</th>
            <th>Luas Gudang</th>
            <th>Jumlah Karyawan</th>
            <th>Tools</th>
        </tr>
        <?php
            $mySql = "SELECT k_gudang.*, gudang.nama_gudang, gudang.lokasi_gudang, gudang.luas_gudang,
             count(k_gudang.nik) AS jumlah_karyawan FROM k_gudang
            LEFT JOIN gudang ON gudang.id=k_gudang.id_gudang 
            LEFT JOIN tkaryawan ON tkaryawan.nik=k_gudang.nik 
            GROUP BY gudang.id 
            ORDER BY jumlah_karyawan DESC";

            $myQry = mysqli_query($koneksi, $mySql) or die ("Query salah: ".mysqli_error($koneksi));
            $nomor =1;
            while ($kolomData = mysqli_fetch_array($myQry)){
        
        ?>
        <tr>
            <td><?php echo $nomor++; ?></td>
            <td><?php echo$kolomData['nama_gudang']; ?></td>
            <td><?php echo$kolomData['lokasi_gudang']; ?></td>
            <td><?php echo$kolomData['luas_gudang']; ?>m<sup>2</sup></td>
            <td><?php echo$kolomData['jumlah_karyawan']; ?></td>
            
            <td>
                <A href="distribusi_detail.php?id=<?php echo $kolomData['id_gudang'];?>" title="Detail Data" class="btn btn-primary btn-sm">
                <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></A>
            </td>
        </tr>
        <?php } ?>
 </table>
    </div>
    <?php include "Footer.php"; ?>