<?php
include '../koneksi/koneksi.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $piket = $_POST['piket'];
    $sql = "UPDATE tb_piket SET piket = '$piket' WHERE id_piket = '$id'";

    if (mysqli_query($konek, $sql)) {
        echo "<script>alert('piket telah berhasil diperbaharui!');</script>";
        echo '<meta http-equiv="refresh" content="0; url=data_piket_adm.php">';
    } else {
        echo "Gagal Diperbaharui " . mysqli_error($konek);
    }
}
