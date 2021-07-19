<?php include "header.php"; ?>
    <?php
    $nik =$_GET['nik'];
    $sql =mysqli_query($koneksi, "SELECT * FROM k_gudang WHERE nik='$nik'");
    if(mysqli_num_rows($sql)>=1){
        ?>
            <div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
            </button>Karyawan dengan NIK <?php echo $nik;?> sudah pernah didistribusikan</div>

        <?php
    }
            $row =mysqli_fetch_assoc($sql);

            if(isset($_POST ['save'])){
                $nik            =$_POST['nik'];
                $id_gudang      =$_POST['id_gudang'];

                $tambah = mysqli_query($koneksi, "INSERT INTO k_gudang(nik,id_gudang)
                VALUES('$nik', '$id_gudang')") or die(mysqli_error());
               if($tambah){
            ?>
            <div class="alert alert-succes aler-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data berhasil ditambahkan.</div>
            <meta http-equiv="refresh" content="0; url=distribusi_data.php">
            <?php
            }else {
                ?> <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert aria-hidden="true>&times;</button>
                Data gagal ditambahkan, silahkan coba lagi.</div>
                <?php
            }
        }
        ?>
        <h2>Distribusi Gudang &raquo; Pilih Gudang</h2>
        <hr/>
        <form class="form-horizontal" action="" method="post">
            <div class="form-group">
            <label class="col-sm-3 control-label">NIK</label>
            <div class="col-sm-2">
                    <input type="text" name="nik" value="<?php echo $nik; ?>" class="form-control" placeholder="nik" required readonly>
            </div>
            </div>
            <div class="form-group">
            <?php
                $Que = "SELECT tkaryawan.* FROM tkaryawan WHERE nik=$nik";
                $myQry = mysqli_query($koneksi, $Que) or die ("Gagal Query nub karyawan".mysqli_error($koneksi));
                $datakaryawan= mysqli_fetch_array($myQry);
            ?>
            <label class="col-sm-3 control-label">Nama</label>
            <div class="col-sm-3">
                <input type="text" value="<?php echo $datakaryawan['nama']; ?>" class="form-control" disabled>
            </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Pilih Gudang</label>
                <div class="col-sm-3">
                <select name="id_gudang" class="form-control">
                    <?php
                    $Que ="SELECT gudang.* FROM gudang";
                    $myQry= mysqli_query($koneksi, $Que) or die("Gagal Query sub gudang".mysqli_error($koneksi));
                    while($list=mysqli_fetch_array($myQry)){
                        echo "<option value='$list[id]' $cek> $list[nama_gudang]</option>";
                    }
                    ?>
                
                </select>
                   </div>
                </div>
            </div>
            <div class="form-group">
            <label class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-6">
            <button type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan">Simpan</button>
            <button type="reset"  class="btn btn-sm btn-warning" value="Reset">Reset</button>
            <button class="btn btn-sm btn-danger" oncclick="history.back()">Kembali</button>
            </div>
            </div>
        </form>
    <?php include "Footer.php"; ?>
                
