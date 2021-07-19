<?php include "header.php"; ?>
    

<h2>Data Gudang</h2>
<hr/>
    <div class="form-group">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    <a href="gudang_add.php">Tambah Data</a>
    </div>
    <br/>
    <div class="table-responsive">
    <table class="table table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Nama Gudang</th>
            <th>Lokasi Gudang</th>
            <th>Luas Gudang</th>
            <th>Tools</th>
        </tr>
        <?php
            $mysql = "SELECT * FROM gudang";
            $myQry = mysqli_query($koneksi, $mysql) or die ("Query salah: ".mysqli_error($koneksi));
            $nomor =1;
            while ($kolomData = mysqli_fetch_array($myQry)){
        
        ?>
        <tr>
            <td><?php echo$nomor++; ?></td>
            <td><?php echo$kolomData['nama_gudang']; ?></td>
            <td><?php echo$kolomData['lokasi_gudang']; ?></td>
            <td><?php echo$kolomData['luas_gudang']; ?>m<sup>2</sup></td>
            
            <td>
                <a href="gudang_edit.php ?id=<?php  echo $kolomData['id'];?>" title="Edit Data" class="btn btn-primary btn-sm">
                <span class="glyphicion glyphicion-edit" aria-hidden="true"></span></a>
                <a href="gudang_delete.php ?id=<?php  echo $kolomData['id'];?>" title="Hapus Data" onclick="confirm('yakin Menghapus data ini?')" class="btn btn-danger btn-sm">
                <span class="glyphicion glyphicion-trash" aria-hidden="true"></span></a>
            </td>
        </tr>
        <?php } ?>
 </table>
    </div>
    <?php include "Footer.php"; ?>