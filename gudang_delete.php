<?php include "header.php";
if($_GET){
    if(empty($_GET['id'])){
?>

<b>Data yang dihapus tidak ada</b>

<?php
    }else{
        $mySql ="DELETE FROM gudang WHERE id='".
        $_GET['id']."'";
        $myQry = mysqli_query($koneksi,$mySql) or die("Eror hapus data" .mysqli_error($koneksi));
        if($myQry){
?>

<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                </button>Data gudang Berahasil Di Hapus</div>
                <meta http-equiv='refresh' content='1; url=gudang_data.php'/>
                <?php
        }
    }
}
?>