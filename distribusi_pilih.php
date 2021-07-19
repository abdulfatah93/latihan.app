<?php include "header.php"; ?>
<h2>Cetak Distribusi Gudang &raquo; Pilih Data</h2>
<hr/>

    <form class="col-sm-3" action="distribusi_cetak.php" method="get">
    <div class="form-group">
        <label class="col-sm-3" conttrol-label>Pilih Gudang</label>
        <div class="col-sm-4">
        <select name="id" class="form-control">
        <?php
        $Que = "SELECT gudang.* FROM gudang";
        $myQry = mysqli_query($koneksi, $Que)or die("Gagal Query sub gudang ".mysqli_error($koneksi));
        while ($list=mysqli_fecth_array($myQry)){
            echo "<option value='$list[id]' $cek>$list[nama_gudang]</option>";
        }
        ?>
        </select>
        </div>
    </div>

    <div class="form-group">
    <label class="col-sm-3 control-label"> &nbsp;</label>
    <div class="col-sm-6">
    <button type="submit" class="btn btn-sm btn-primary" value="Simpan">Proses</button>
    <button type="reset" class="btn btn-sm btn-warning" value="Reset">Reset</button>
    <button class="btn btn-sm btn-danger" onclick="history.back()">Kembali</button>
    </div>
    </div>
     </form>
     <?php include "Footer.php"; ?>