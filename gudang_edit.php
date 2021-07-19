<?php include "header.php"; ?>

        <?php
        $nik = $_GET['id'];
        $sql = mysqli_query($koneksi, "SELECT * FROM gudang WHERE id='$id'");
        if(mysqli_num_rows($sql)==0){
         ?>
          <div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                </button>GUDANG TIDAK ADA..! </div>
        <?php
        }else{
                $row = mysqli_fetch_assoc($sql);
        }
        //        Proses Simpan Data
        if(isset($_POST['save'])){
            $id                  = $_POST['id'];
            $nama_gudang         = $_POST['nama_gudang'];
            $lokasi_gudang       = $_POST['lokasi_gudang'];
            $luas_gudang         = $_POST['luas_gudang'];

                $update = mysqli_query($koneksi, "UPDATE gudang SET id='$id', nama_gudang='$nama_gudang',
                lokasi_gudang='$lokasi_gudang', luas_gudang='$luas_gudang' WHERE id='$id'") or die(mysqli_error());
                if($update){
                 ?>
                  <div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                </button>DATA BERHASIL DISIMPAN.</div>
                <?php
                }else{
                ?>
                 <div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                </button>DATA GAGAL DISIMPAN,SILAHKAN COBA LAGI.</div>
                <?php
                }
        }
        ?>



<h2>Data Gudang &raquo; Tambah Data</h2>
<hr/>
<form class="form-horizontal" action="" method="POST">
<div class="form-group" >
    <label class="col-sm-3 control-label">ID Gudang</label>
    <div class="col-sm-2">
            <input type="text" name="id" class="form-control" placeholder="id" disabled required>
    </div>
    </div>

    <div class="form-group" >
    <label class="col-sm-3 control-label">Nama Gudang</label>
    <div class="col-sm-4">
            <input type="text" name="nama_gudang" value="<?php echo $row['nama_gudang'] ?>" class="form-control" placeholder="Nama Gudang" required>
    </div>
    </div>

    <div class="form-group" >
    <label class="col-sm-3 control-label">Lokasi Gudang</label>
    <div class="col-sm-4">
            <input type="text" name="lokasi_gudang" value="<?php echo $row['lokasi_gudang'] ?>" class="form-control" placeholder="Lokasi Gudang" required>
    </div>
    </div>

    <div class="form-group" >
    <label class="col-sm-3 control-label">Luas Gudang</label>
    <div class="col-sm-4">
            <input type="text" name="luas_gudang" value="<?php echo $row['luas_gudang'] ?>"  class="form-control" placeholder="Luas Gudang" required>
    </div>
    </div>

   

    <div class="form-group" >
    <label class="col-sm-3 control-label">&nbsp;</label>
    <div class="col-sm-6">
            <button type="submit" name="save" class="btn btn-sm btn-primary" value="simpan">Simpan</button>
            <button type="reset" class="btn btn-sm btn-warning" value="Reset">Reset</button>
            <button class="btn btn-sm btn-danger" onclick="history.back()">Kembali</button>
          
    </div>
    </div>
    </form>
    <?php include "Footer.php"?>